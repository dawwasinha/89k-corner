<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@89kcorner.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'room_id' => null,
        ]);

        User::factory()->create([
            'name' => 'Salsabila',
            'email' => 'salsabillaoctav@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(RoomSeeder::class);
    }
}
