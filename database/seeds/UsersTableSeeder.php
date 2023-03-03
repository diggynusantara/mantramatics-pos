<?php

use Illuminate\Database\Seeder;
use App\Models\User;

// Spatie Role & Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'      => 'Mr. Admin',
            'username'  => 'admin',
            'email'     => 'admin@goodlookingsoft.io',
            'password'  => bcrypt('00000000'),
            'status'    => true,
            'photo'     => 'default-mr-admin.jpg'
        ]);

        $operator = User::create([
            'name'      => 'Mr. Ajay',
            'username'  => 'ajay',
            'email'     => 'ajay@goodlookingsoft.io',
            'password'  => bcrypt('00000000'),
            'status'    => true,
            'photo'     => 'default-mr-ajay.png'
        ]);

        $cashier = User::create([
            'name'      => 'Mr. Ompong',
            'username'  => 'ompong',
            'email'     => 'ompong@goodlookingsoft.io',
            'password'  => bcrypt('00000000'),
            'status'    => true,
            'photo'     => 'default-mr-ompong.png'
        ]);

        $admin-> assignRole('admin');
        $admin-> givePermissionTo(Permission::all());

        $operator-> assignRole('operator');
        $operator-> givePermissionTo('show products', 'create products', 'delete products');

        $cashier-> assignRole('cashier');
        $cashier-> givePermissionTo('transactions');

    }
}
