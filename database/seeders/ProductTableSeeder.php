<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'package_id' => 2,
            'name' => 'Plus Dressing Interior (Khusus Super)',
            'type' => 'additional',
            'description' => 'Khusus paket Super',
            'price' => 30000,
        ]);
        Product::create([
            'package_id' => 3,
            'name' => 'Plus Dressing Interior (Khusus Deluxe)',
            'type' => 'additional',
            'description' => 'Khusus Paket Deluxe',
            'price' => 25000,
        ]);
        Product::create([
            'package_id' => 4,
            'name' => 'Plus Dressing Interior (Khusus Executive)',
            'type' => 'additional',
            'description' => 'Khusus Paket Executive',
            'price' => 25000,
        ]);
        Product::create([
            'package_id' => 5,
            'name' => 'Plus Dressing Interior (Khusus Luxury)',
            'type' => 'additional',
            'description' => 'Khusus Paket Luxury',
            'price' => 25000,
        ]);
        Product::create([
            'package_id' => 5,
            'name' => 'Plus Nano Creamic (Khusus Luxury)',
            'type' => 'additional',
            'description' => 'Khusus Paket Luxury (Start from)',
            'price' => 200000,
        ]);

        Product::create([
            'name' => 'Jamur Kaca Depan',
            'type' => 'additional',
            'price' => 75000,
        ]);
        Product::create([
            'name' => 'Jamur Kaca',
            'type' => 'additional',
            'price' => 150000,
        ]);
        Product::create([
            'name' => 'Jamur Body',
            'type' => 'additional',
            'price' => 200000,
        ]);
        Product::create([
            'name' => 'Dressing Interior',
            'type' => 'additional',
            'price' => 40000,
        ]);
        Product::create([
            'name' => 'Wax',
            'type' => 'additional',
            'price' => 40000,
        ]);
        Product::create([
            'name' => 'Coating Kaca',
            'type' => 'additional',
            'price' => 200000,
        ]);
        Product::create([
            'name' => 'Cuci Mesin',
            'type' => 'additional',
            'price' => 100000,
        ]);
        Product::create([
            'name' => 'Nano Creamic',
            'type' => 'additional',
            'description' => '(Start from)',
            'price' => 400000,
        ]);
        Product::create([
            'name' => 'White Paint Cleaner',
            'type' => 'additional',
            'price' => 350000,
        ]);
        Product::create([
            'name' => 'Nano Creamic Motorcycle 125-250 CC',
            'type' => 'additional',
            'description' => 'Additional for Motorcycle',
            'price' => 150000,
        ]);
        Product::create([
            'name' => 'Nano Creamic Motorcycle 250 CC UP',
            'type' => 'additional',
            'description' => 'Additional for Motorcycle',
            'price' => 250000,
        ]);
        Product::create([
            'name' => 'Nano Creamic Motorcycle Harley Davidson',
            'type' => 'additional',
            'description' => 'Additional for Motorcycle',
            'price' => 350000,
        ]);
    }
}
