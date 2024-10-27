<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'price' => '199.99',
            'size' => 'M',
            'color' => 'Red',
            'picture' => '/home/winneywtp/Laravel-Ecommerce/Pooh-page/resources/views/components/red-shirt.jpg',
            'description' => 'Stylish Red Shirt',
            'stock_quantity' => 10,
        ]);

        Product::create([
            'price' => '299.99',
            'size' => 'L',
            'color' => 'Red',
            'picture' => '/home/winneywtp/Laravel-Ecommerce/Pooh-page/resources/views/components/red-shirt.jpg',
            'description' => 'Stylish Red Shirt',
            'stock_quantity' => 10,
        ]);

        // Add more products as needed
    }
}
