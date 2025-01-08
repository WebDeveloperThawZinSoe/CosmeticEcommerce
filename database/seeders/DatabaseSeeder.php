<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Type;
use App\Models\ProductCategory;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
        ]);

        // Create types
        Type::create(['name' => 'VIP', 'discount_amount' => 10]);
        Type::create(['name' => 'Regular', 'discount_amount' => 5]);

        // Create product categories
        ProductCategory::create(['name' => 'Electronics']);
        ProductCategory::create(['name' => 'Clothing']);

        // Create an admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Admin');

        // Create a customer user
        $customer = User::create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
        ]);
        $customer->assignRole('Customer');
    }
}
