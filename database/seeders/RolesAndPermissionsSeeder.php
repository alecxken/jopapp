<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view-dashboard',
            'view-jobs',
            'create-job',
            'edit-job',
            'delete-job',
            'view-applications',
            'create-application',
            'edit-application',
            'delete-application',
            'view-users',
            'create-user',
            'edit-user',
            'delete-user',
            'view-roles',
            'create-role',
            'edit-role',
            'delete-role',
            'view-permissions',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'view-reports',
            'export-data',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $roles = [
            'Super Admin' => Permission::all(),
            'Admin' => [
                'view-dashboard',
                'view-jobs',
                'create-job',
                'edit-job',
                'delete-job',
                'view-applications',
                'create-application',
                'edit-application',
                'delete-application',
                'view-users',
                'create-user',
                'edit-user',
                'view-reports',
                'export-data',
            ],
            'Manager' => [
                'view-dashboard',
                'view-jobs',
                'create-job',
                'edit-job',
                'view-applications',
                'edit-application',
                'view-reports',
            ],
            'HR Officer' => [
                'view-dashboard',
                'view-jobs',
                'view-applications',
                'edit-application',
                'view-reports',
            ],
            'Recruiter' => [
                'view-dashboard',
                'view-jobs',
                'view-applications',
            ],
            'User' => [
                'view-dashboard',
                'view-jobs',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            if ($rolePermissions instanceof \Illuminate\Database\Eloquent\Collection) {
                $role->syncPermissions($rolePermissions);
            } else {
                $role->syncPermissions($rolePermissions);
            }
        }

        // Assign all roles to user 1
        $user = User::find(1);

        if ($user) {
            // Get all roles
            $allRoles = Role::all();

            // Assign all roles to user 1
            $user->syncRoles($allRoles);

            $this->command->info('All roles assigned to User 1 (' . $user->name . ')');
        } else {
            $this->command->warn('User with ID 1 not found. Please create a user first.');
        }

        $this->command->info('Roles and permissions seeded successfully!');
    }
}
