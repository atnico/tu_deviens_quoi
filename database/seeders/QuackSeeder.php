<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Quacks;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quacks::create([
            'content' => 'texte',
            'image' => 'string',
            'tags' => 'string',
            'user_id' => rand(1, User::count()),
            


        ]);

        \App\Models\Quacks::factory(20)->create();
    }
}
