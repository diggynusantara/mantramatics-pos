<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

// Auth Function
use Illuminate\Support\Facades\Auth;

//For Update Password
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

// Untuk Upload File Gambar
use File;
use Image;

class ProfileController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function edit(User $user) {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        // if(Auth::user()->email == request('email'))
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'username' => 'required|string|max:50',
            'email'    => 'required|email|exists:users,email',
            'photo'    => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

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
            'photo'    => $photo
        ]);

        return redirect()->route('profile.index')->with('info', 'Profile Anda berhasil diperbaharui !');
    }

    public function editPassword(User $user){
        $user = Auth::user();

        return view('profile.edit_password', compact('user'));
    }

    public function updatePassword(Request $request, User $user) {
        $this->validate($request, [
           'old_password'     => 'required|min:8',
           'new_password'     => 'required|min:8',
           'confirm_password' => 'required|same:new_password'
        ]);

        if (Hash::check($request->get('old_password'), Auth::user()->password)) {
            // $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->get('new_password'));
            if ($user->save()) {
                return redirect()->route('profile.index')->with('info', 'Your password has been updated !');
            }
        } else {
            return redirect()->back()->with('danger', 'Wrong password entered !');
        }
    }

    // public function updatePassword(User $user)
    // {
    //     $this->validate(request(), [
    //         // 'name' => 'required',
    //         // 'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6|confirmed'
    //     ]);
    //
    //     // $user->name = request('name');
    //     // $user->email = request('email');
    //     $user->password = bcrypt(request('password'));
    //
    //     $user->save();
    //
    //     return redirect()->route('profile.index')->with('info', 'Password Anda berhasil diperbaharui !');
    // }

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

}
