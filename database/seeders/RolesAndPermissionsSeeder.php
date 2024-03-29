<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create complain']);
        Permission::create(['name' => 'delete complain']);
        Permission::create(['name' => 'update complain']);
        Permission::create(['name' => 'view complain']);

        Permission::create(['name' => 'user dashboard']);
        Permission::create(['name' => 'nodal dashboard']);
        Permission::create(['name' => 'fco dashboard']);

        // this can be done as separate statements
        $role = Role::create(['name' => 'user'])->givePermissionTo('create complain', 'view complain');
        
        $role = Role::create(['name' => 'nodal'])->givePermissionTo('delete complain', 'update complain', 'view complain');
        
        $role = Role::create(['name' => 'fco'])->givePermissionTo('delete complain', 'update complain', 'view complain');
        
        $role = Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
    }
}
