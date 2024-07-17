<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view rescue cases']);
        Permission::create(['name' => 'add rescue cases']);
        Permission::create(['name' => 'delete rescue cases']);
        Permission::create(['name' => 'view child profile']);
        Permission::create(['name' => 'add child profile']);
        Permission::create(['name' => 'edit child profile']);
        Permission::create(['name' => 'delete child profile']);
        Permission::create(['name' => 'view director']);
        Permission::create(['name' => 'edit director profile']);
        Permission::create(['name' => 'delete director profile']);
        Permission::create(['name' => 'view social-worker info']);
        Permission::create(['name' => 'edit social-worker profile']);
        Permission::create(['name' => 'delete social-worker profile']);
        Permission::create(['name' => 'view report']);

        // Create roles and assign created permissions

        // Admin role
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        // Director role
        $director = Role::create(['name' => 'director']);
        $director->givePermissionTo(['add child profile','view child profile', 'edit child profile', 'delete child profile','view social-worker info', 'view report']);

        // Social Worker role
        $socialWorker = Role::create(['name' => 'social-worker']);
        $socialWorker->givePermissionTo(['add child profile','view child profile', 'edit child profile', 'delete child profile']);
    }
    }

