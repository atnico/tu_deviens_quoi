<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Quacks;
use App\Models\Comments;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::create([
            'content' => 'texte',
            'image' => 'string',
            'tags' => 'string',
            'user_id' => rand(1, User::count()),
            'quack_id' => rand(1, Quacks::count()),
            


        ]);

        \App\Models\Comments::factory(20)->create();
    }
}
