<?php

use Illuminate\Database\Seeder;

// Spatie Role & Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run() {

         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'show products']);
         Permission::create(['name' => 'create products']);
         Permission::create(['name' => 'delete products']);
         Permission::create(['name' => 'transactions']);

         // Give Permissions to Admin
         $role = Role::create(['name' => 'admin']);
         $role->givePermissionTo(Permission::all());

         // Give Permissions to Operator
         $role = Role::create(['name' => 'operator']);
         $role->givePermissionTo('show products', 'create products', 'delete products');

         // Give Permissions to Kasir
         $role = Role::create(['name' => 'cashier']);
         $role->givePermissionTo('transactions');

     }
}
