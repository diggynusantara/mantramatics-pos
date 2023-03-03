<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

// Spatie Role & Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Utk Query Database
use DB;

// Untuk Upload File Gambar
use File;
use Image;

class UserController extends Controller {

    public function index() {
        $users = User::orderBy('created_at', 'ASC')->get();
        // ATAU
        // $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        $role = Role::orderBy('name', 'ASC')->get();

        return view('users.create', compact('role'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'      => 'required|string|max:100',
            'username'  => 'required|string|max:50|unique:users',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8',
            'role'      => 'required|string|exists:roles,name'
        ]);

        try {
            // Default $photo = null
            $photo = null;

            // Jika terdapat file (Foto / Gambar) yang dikirim
            if ($request->hasFile('photo')) {

                // Maka menjalankan method saveFile()
                $photo = $this->saveFile($request->name, $request->file('photo'));

            }

            $user = User::firstOrCreate([
                'username'  => $request->username
            ], [
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                // 'status'    => true,
                'status'   => $request->status,
                'photo'    => $photo
            ]);

            $user->assignRole($request->role);

            if ($request->role == 'admin') {
                $user->givePermissionTo(Permission::all());
            }
            elseif ($request->role == 'operator') {
                $user->givePermissionTo('show products', 'create products', 'delete products');
            }
            elseif ($request->role == 'cashier') {
                $user->givePermissionTo('transactions');
            }

            return redirect()->route('users.index')->with('success', 'User ' . $user->name . ' berhasil ditambahkan !');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'username' => 'required|string|max:50',
            'email'    => 'required|email|exists:users,email',
            'password' => 'nullable|min:8',
            'status'   => 'required',
            'photo'    => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try {
            $user     = User::findOrFail($id);
            $password = !empty($request->password) ? bcrypt($request->password):$user->password;

            $photo = $user->photo;

            // Cek jika ada file yang dikirim dari form
            if ($request->hasFile('photo')) {

                // Cek, jika photo tidak kosong maka file yang ada di folder uploads/users akan dihapus
                !empty($photo) ? File::delete(public_path('uploads/users/' . $photo)):null;

                // Uploading file dengan menggunakan method saveFile() yg telah dibuat sebelumnya
                $photo = $this->saveFile($request->name, $request->file('photo'));

            }

            $user->update([
                'name'     => $request->name,
                'username' => $request->username,
                'password' => $password,
                'status'   => $request->status,
                'photo'    => $photo
            ]);

            return redirect()->route('users.index')->with('info', 'User ' . $user->name . ' berhasil diperbaharui !');
        }
        catch (\Exception $e) {
              return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        // Mengecek, jika field photo tidak null / kosong
        if (!empty($user->photo)) {

            //file akan dihapus dari folder uploads/users
            File::delete(public_path('uploads/users/' . $user->photo));

        }

        $user->delete();

        return redirect()->back()->with('danger', 'User ' . $user->name . ' telah dihapus !');
    }

    private function saveFile($name, $photo) {
        // Set nama file adl gabungan antara nama produk dan time(). Ekstensi gambar tetap dipertahankan
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();

        // Set path untuk menyimpan gambar
        $path = public_path('uploads/users');

        // Cek jika uploads/users bukan direktori / folder
        if (!File::isDirectory($path)) {

            //maka folder tersebut dibuat
            File::makeDirectory($path, 0777, true, true);

        }

        // Simpan gambar yang diuplaod ke folrder uploads/produk
        Image::make($photo)->save($path . '/' . $images);

        // Mengembalikan nama file yang ditampung divariable $images
        return $images;
    }

    // USERS / CHANGE ROLE -----------------------------------------------------

    public function roles(Request $request, $id) {
        $user        = User::findOrFail($id);
        $roles       = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');

        return view('users.roles', compact('user', 'roles', 'permissions'));
    }

    public function setRole(Request $request, $id) {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);

        // Menggunakan syncRoles agar terlebih dahulu menghapus semua role yang dimiliki
        // Kemudian di-set kembali agar tidak terjadi duplicate
        $user->syncRoles($request->role);

        if ($request->role == 'admin') {
            $user->syncPermissions(Permission::all());
        }
        elseif ($request->role == 'operator') {
            $user->syncPermissions('show products', 'create products', 'delete products');
        }
        elseif ($request->role == 'cashier') {
            $user->syncPermissions('transactions');
        }

        return redirect()->back()->with('info' , 'Role dari user ' . $user->name . ' telah di perbaharui !');
    }

    //  USERS / ROLE & PERMISSION ----------------------------------------------

    public function rolePermission(Request $request) {
        $role = $request->get('role');

        // Default, set dua buah variable dengan nilai null
        $permissions   = null;
        $hasPermission = null;

        // Mengambil data role
        $roles = Role::all()->pluck('name');

        // Apabila parameter role terpenuhi
        if (!empty($role)) {
            // Select role berdasarkan namenya, ini sejenis dengan method find()
            $getRole = Role::findByName($role);

            // Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();

            // Mengambil data permission
            $permissions = Permission::all()->pluck('name');
        }

        return view('users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success' , 'Permission ' . $permission->name . ' berhasil ditambahkan !');;
    }

    public function setRolePermission(Request $request, $role) {
        // Select role berdasarkan namanya
        $role = Role::findByName($role);

        // Fungsi syncPermission akan menghapus semua permissio yg dimiliki role tersebut
        // Kemudian di-assign kembali sehingga tidak terjadi duplicate data
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('info' , 'Permission to Role telah diperbaharui !');
    }

    public function destroyRolePermision($id) {

    }

}
