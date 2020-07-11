<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'admin', 'home',
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'permission-list', 'permission-create', 'permission-edit', 'permission-delete',
            'category-list', 'category-create', 'category-edit', 'category-delete',
            'product-list', 'product-create', 'product-detail', 'product-edit', 'product-delete',
            'discount-list', 'discount-create', 'discount-edit', 'discount-delete',
            'supplier-list', 'supplier-create', 'supplier-edit', 'supplier-delete',
            'species-list', 'species-create', 'species-edit', 'species-delete',
            'bill-list', 'bill-create', 'bill-edit', 'bill-detail', 'bill-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
