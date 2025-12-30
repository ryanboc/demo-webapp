<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['description' => 'Administrator']);
        $userRole = Role::firstOrCreate(['name' => 'user'], ['description' => 'Regular user']);

        // Create permissions
        $manageUsers = Permission::firstOrCreate(['name' => 'manage users'], ['description' => 'Manage users']);
        $viewDashboard = Permission::firstOrCreate(['name' => 'view dashboard'], ['description' => 'View dashboard']);

        // Attach permissions to roles
        $adminRole->permissions()->syncWithoutDetaching([$manageUsers->id, $viewDashboard->id]);
        $userRole->permissions()->syncWithoutDetaching([$viewDashboard->id]);

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('admin');

        // Create a test user
        $test = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $test->assignRole('user');

        // Create additional random users
        User::factory(8)->create()->each(function ($u) {
            $u->assignRole('user');
        });
    }
}
