<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::find(1);
        $admin->permissions()->sync(Permission::get()->pluck('id'));

        $service_provider = Role::find(2);
        $service_provider->permissions()->sync([3, 7, 8, 9, 10]);

        $customer = Role::find(3);
        $customer->permissions()->sync([3, 7, 8, 11, 12]);
    }
}
