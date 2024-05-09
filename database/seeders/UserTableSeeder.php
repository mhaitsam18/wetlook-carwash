<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Member;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@wetlook.com',
            'username' => 'admin',
            'password' => Hash::make('1234'),
            'role' => 'admin',
            'photo' => 'user-photo/administrator.png',
        ]);
        Admin::create([
            'user_id' => $user_admin->id
        ]);
        $user_member = User::factory()->create([
            'name' => 'Member',
            'email' => 'member@wetlook.com',
            'username' => 'member',
            'password' => Hash::make('1234'),
            'role' => 'member',
            'photo' => 'user-photo/aldin.jpg',
        ]);
        $member = Member::create([
            'user_id' => $user_member->id,
            'address' => 'Bogor',
            'phone_number' => '+62 851-5949-6533'
        ]);

        Vehicle::create([
            'member_id' => $member->id,
            'plate_number' => 'D 5683 ABY',
            'type' => 'motorcycle',
            'make' => 'Honda',
            'model' => 'Vario CBS 125',
            'colour' => 'Hitam',
            'image' => 'vehicle/vario-cbs.jpg',
        ]);
        Vehicle::create([
            'member_id' => $member->id,
            'plate_number' => 'B 1725 UAD',
            'type' => 'car',
            'make' => 'Toyota',
            'model' => 'Toyota Vios',
            'colour' => 'Biru Metalic',
            'image' => 'vehicle/vios.jpg',
        ]);
    }
}
