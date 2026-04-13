<?php

namespace Database\Seeders;

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
            // Dashboard
            'view-dashboard',

            // Jobs
            'view-jobs',
            'create-job',
            'edit-job',
            'delete-job',

            // Applications / Applicants
            'view-applications',
            'create-application',
            'edit-application',
            'delete-application',

            // Selection module
            'view-selection',          // Access Selection section
            'view-applicant-details',  // View individual applicant details
            'view-checklist',          // View & run checklists

            // Reports module
            'view-reports',
            'export-data',

            // User management (Admin only)
            'view-users',
            'create-user',
            'edit-user',
            'delete-user',

            // Role/Permission management (Admin only)
            'view-roles',
            'create-role',
            'edit-role',
            'delete-role',
            'view-permissions',
            'create-permission',
            'edit-permission',
            'delete-permission',

            // Legacy permission kept for backward compatibility
            'Administer roles & permissions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ── Roles ──────────────────────────────────────────────────────────────

        // Admin — full access
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->syncPermissions(Permission::all());

        // Selection — recruitment team: evaluate & shortlist applicants
        $selection = Role::firstOrCreate(['name' => 'Selection']);
        $selection->syncPermissions([
            'view-dashboard',
            'view-jobs',
            'view-applications',
            'create-application',
            'edit-application',
            'view-selection',
            'view-applicant-details',
            'view-checklist',
        ]);

        // Reports — reporting & data export only
        $reports = Role::firstOrCreate(['name' => 'Reports']);
        $reports->syncPermissions([
            'view-dashboard',
            'view-jobs',
            'view-applications',
            'view-reports',
            'export-data',
        ]);

        // Assign Admin role to user 1 if exists
        $user = User::find(1);
        if ($user) {
            $user->syncRoles(['Admin']);
            $this->command->info('Admin role assigned to User 1 (' . $user->name . ')');
        } else {
            $this->command->warn('User with ID 1 not found. Please create a user first.');
        }

        $this->command->info('Roles and permissions seeded successfully!');
        $this->command->info('Roles created: Admin, Selection, Reports');
    }
}
