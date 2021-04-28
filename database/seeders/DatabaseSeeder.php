<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Team;
use App\Models\Comment;
use App\Models\User;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Team::factory(10)->hasPlayers(10)->create();
        User::factory(10)->create();
        Comment::factory(30)->create();
        News::factory(20)->create();    
    }
}
