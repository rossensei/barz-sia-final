<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// database/seeders/AdminSeeder.php
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create an admin role
        $adminRole = Role::create(['name' => 'admin']);

        // Create a permission for managing customers
        $manageCustomersPermission = Permission::create(['name' => 'manage customers']);

        // Assign the manage customers permission to the admin role
        $adminRole->givePermissionTo($manageCustomersPermission);

        // Create an admin user
        $adminUser = User::create([
            'name' => 'Virnie Gudia',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'), // Replace with your desired password
        ]);

        // Assign the admin role to the admin user
        $adminUser->assignRole($adminRole);
    }
}

