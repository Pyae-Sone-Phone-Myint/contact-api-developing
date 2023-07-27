<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(4)->create();

        User::factory()->create([
            "name" => "Pyae Sone",
            "email" => "ps@gmail.com",
            "password" => Hash::make("adfdafda"),
        ]);
    }
}
