<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ["name" => "view_users"],
            ["name" => "delete_users"],
            ["name" => "view_orders"],
            ["name" => "delete_orders"],
            ["name" => "view_service_provider"],
            ["name" => "delete_service_provider"],
            ["name" => "register"],
            ["name" => "update_profile"],
            ["name" => "create_service"],
            ["name" => "update_service"],
            ["name" => "create_order"],
            ["name" => "cancel_order"],
            ["name" => "activate_service_provider"],
            ["name" => "diactivate_service_provider"],
        ]);
    }
}
