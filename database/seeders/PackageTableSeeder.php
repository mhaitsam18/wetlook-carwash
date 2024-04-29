<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'room_id' => 1,
            'name' => 'Basic',
            'description' => '
            <ul>
                <li>Exterior Cuci Wax</li>
                <li>Semir Ban</li>
            </ul>
            ',
            'duration' => 1,
            'price' => 50000,
        ]);
        Package::create([
            'room_id' => 1,
            'name' => 'Super',
            'description' => '
            <ul>
                <li>Exterior / Cuci Wax</li>
                <li>Interior</li>
                <li>Semir Ban</li>
                <li>Plus Dressing Interior + 30.000</li>
            </ul>
            ',
            'duration' => 2,
            'price' => 70000,
        ]);
        Package::create([
            'room_id' => 1,
            'name' => 'Deluxe',
            'description' => '
            <ul>
                <li>Cuci Mesin</li>
                <li>Exterior</li>
                <li>Semir Ban</li>
                <li>Interior</li>
                <li>Plus Dressing Interior + 25.000</li>
            </ul>
            ',
            'duration' => 2,
            'price' => 150000,
        ]);
        Package::create([
            'room_id' => 1,
            'name' => 'Executive',
            'description' => '
            <ul>
                <li>Jamur Kaca</li>
                <li>Cuci Mesin</li>
                <li>Exterior</li>
                <li>Semir Ban</li>
                <li>Interior</li>
                <li>Plus Dressing Interior + 25.000</li>
            </ul>
            ',
            'duration' => 3,
            'price' => 250000,
        ]);
        Package::create([
            'room_id' => 1,
            'name' => 'Luxury',
            'description' => '
            <ul>
                <li>Jamur Body</li>
                <li>Jamur Kaca</li>
                <li>Exterior</li>
                <li>Interior</li>
                <li>Wax</li>
                <li>Plus Dressing Interior + 25.000</li>
                <li>Plus Nano Creamic + 200.000 (Star from)</li>
            </ul>
            ',
            'duration' => 4,
            'price' => 350000,
        ]);
        Package::create([
            'room_id' => 1,
            'name' => 'Luxury Plus (Small Car)',
            'description' => '
            <ul>
                <li>Jamur Body</li>
                <li>Jamur Kaca</li>
                <li>Exterior</li>
                <li>Interior</li>
                <li>Wax</li>
                <li>Semir Ban</li>
                <li>Cuci Mesin</li>
                <li>Dressing Interior</li>
                <li>Nano Creamic</li>
                <li>Coating Kaca</li>
            </ul>
            ',
            'duration' => 4,
            'price' => 650000,
        ]);
        Package::create([
            'room_id' => 1,
            'name' => 'Luxury Plus (Large Car)',
            'description' => '
            <ul>
                <li>Jamur Body</li>
                <li>Jamur Kaca</li>
                <li>Exterior</li>
                <li>Interior</li>
                <li>Wax</li>
                <li>Semir Ban</li>
                <li>Cuci Mesin</li>
                <li>Dressing Interior</li>
                <li>Nano Creamic</li>
                <li>Coating Kaca</li>
            </ul>
            ',
            'duration' => 5,
            'price' => 700000,
        ]);
        Package::create([
            'room_id' => 2,
            'name' => 'Motorcycle 125-250 CC',
            'description' => '125-250 CC',
            'duration' => 1,
            'price' => 35000,
        ]);
        Package::create([
            'room_id' => 2,
            'name' => 'Motorcycle 250 CC UP',
            'description' => '250 CC UP',
            'duration' => 1,
            'price' => 45000,
        ]);
        Package::create([
            'room_id' => 2,
            'name' => 'Motorcycle Harley Davidson',
            'description' => 'Harley Davidson',
            'duration' => 1,
            'price' => 70000,
        ]);
    }
}
