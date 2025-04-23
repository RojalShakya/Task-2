<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
      $admin=User::create(
            [
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>'password',

            ]);


        // Permission::create(['name' => 'View Products', 'slug' => 'view-products', 'groupby' => 1]);
        // Permission::create(['name' => 'Add Products', 'slug' => 'add-products', 'groupby' => 1]);
        // Permission::create(['name' => 'Edit Products', 'slug' => 'edit-products', 'groupby' => 1]);
        // Permission::create(['name' => 'Delete Products', 'slug' => 'delete-products', 'groupby' => 1]);

        // Permission::create(['name' => 'View Orders', 'slug' => 'view-orders', 'groupby' => 2]);
        // Permission::create(['name' => 'Update Orders', 'slug' => 'update-orders', 'groupby' => 2]);

        // Permission::create(['name' => 'Manage Users', 'slug' => 'manage-users', 'groupby' => 3]);

        // Permission::create(['name' => 'View Reports', 'slug' => 'view-reports', 'groupby' => 4]);

        // Permission::create(['name' => 'Apply Discount', 'slug' => 'apply-discount', 'groupby' => 5]);
        // Permission::create(['name' => 'Access Admin Panel', 'slug' => 'access-admin-panel', 'groupby' => 6]);


    }

}
