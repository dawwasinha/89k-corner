<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'id' => 1,
                'name' => 'Kamar 1.1',
                'price' => 250000,
                'type_room' => 'AC',
                'facility' => 'Kamar mandi dalam, Ruang tidur enak',
                'image' => 'photos/93VnNFh2cu8Qf3SoXC4Es8y7BrB8BCKZeY1ML4tk.jpg',
                'status' => 'available',
                'created_at' => Carbon::parse('2025-03-26 19:22:28'),
                'updated_at' => Carbon::parse('2025-04-21 17:23:40'),
            ],
            [
                'id' => 5,
                'name' => 'Kamar 1.2',
                'price' => 250000,
                'type_room' => 'Non AC',
                'facility' => 'Kamar mandi dalam, Ruang tidur enak',
                'image' => 'photos/qpqNRlJp4S23GsMRuibDRMI8F68ACS8SwUFV94pU.jpg',
                'status' => 'available',
                'created_at' => Carbon::parse('2025-03-26 19:37:56'),
                'updated_at' => Carbon::parse('2025-04-21 17:18:46'),
            ],
            [
            
                'id' => 6,
                'name' => 'Kamar 1.3',
                'price' => 350000,
                'type_room' => 'AC',
                'facility' => 'Kamar mandi dalam, Ruang tidur enak, Lengkap',
                'image' => 'photos/xIw82wnp7P10jS05dgA5DQ6a7vAKXAPJ97FV9BlC.jpg',
                'status' => 'available',
                'created_at' => Carbon::parse('2025-03-26 19:39:44'),
                'updated_at' => Carbon::parse('2025-04-21 17:23:52'),
            ],
        ]);
    }
}
