<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use Illuminate\Support\Facades\DB;
use App\Models\Game;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Player::factory()->count(10)->create();         
        $playerIds = DB::table('players')->pluck('id')->toArray();

        Game::factory()->count(25)->create();         

        for ($x = 0; $x <= 20; $x++) {
            DB::table('game_player')->insert([
                'player_id' => rand(1, 10),
                'game_id' => rand(1, 25),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
