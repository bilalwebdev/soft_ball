<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'manager']);
        $role = Role::create(['name' => 'super-admin']);
        $permission_1 = Permission::create(['name' => 'add team']);
        $permission_2 = Permission::create(['name' => 'add manager']);
        $permission_3 = Permission::create(['name' => 'site setting']);
        $role->givePermissionTo($permission_1);
        $role->givePermissionTo($permission_2);
        $role->givePermissionTo($permission_3);
        $user = User::first();
        $user->assignRole($role);
    }
}
