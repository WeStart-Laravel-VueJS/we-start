<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    protected $permissions = [
        'view_category' => 'View all Categories',
        'add_category' => 'Add new Category',
        'edit_category' => 'Edit Category',
        'delete_category' => 'Delete Category',

        'view_advertisement' => 'View all Advertisements',
        'add_advertisement' => 'Add new Advertisement',
        'edit_advertisement' => 'Edit Advertisement',
        'delete_advertisement' => 'Delete Advertisement',

        'view_service' => 'View all Services',
        'delete_service' => 'Delete Service',

        'view_reports' => 'View all Reports',

        'view_payments' => 'View All Payments'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->permissions as $code => $name) {
            Permission::create([
                'name' => $name,
                'code' => $code
            ]);
        }
    }
}
