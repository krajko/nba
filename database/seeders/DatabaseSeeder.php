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
        User::factory(10)->create();

        // // populate teams
        Team::factory(30)->hasPlayers(15)->create();

        // //populate news
        News::factory(50)->create();

        // populate pivot table
        $teams = Team::all();
        News::all()->each(function ($news) use ($teams) {
            $news->teams()->attach(
                $teams->random( rand(1, 5) )->pluck('id')->toArray()
            );
        });

        Comment::factory(100)->create();
    }
}
