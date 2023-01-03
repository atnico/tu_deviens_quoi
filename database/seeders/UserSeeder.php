<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => 'admin',
            'lastName' => 'testeur',
            'pseudo' => 'admin',
            'image' => 'admin.jpg',
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'password' => Hash::make("Bebinoute1901,"),
            'role_id' => 2,
            'remember_token' => Str::random(10)
        ]);

        \App\Models\User::factory(20)->create();
    }
}
