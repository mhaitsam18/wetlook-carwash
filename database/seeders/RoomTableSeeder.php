<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'type' => 'Mobil Hidrolik',
            'amount' => 2,
        ]);
        Room::create([
            'type' => 'Motor Steam',
            'amount' => 2,
        ]);
        // Room::create([
        //     'type' => 'Mobil Detailing',
        //     'amount' => 1,
        // ]);
        // Room::create([
        //     'type' => 'Motor Detailing',
        //     'amount' => 1,
        // ]);
    }
}
