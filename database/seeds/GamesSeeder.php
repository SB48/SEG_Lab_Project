<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gameTable = DB::table('games');
        $gameTable->insert([
            'name' => 'Bomberman',
            'price' => 42,
            'ageRating' => '3',
            'genre' => 'Action',
            'description' => 'This top-down action-arcade game consists of nine levels per stage, each tougher than the other, and each final one consisting of the boss that will have to be dealt with. Bomberman can move horizontally and vertically and lay down bombs behind him, thus evaporating the enemies, but beware: Bomberman can block himself with his own bomb, and thus become a victim of his own bomb.',
            'copies' => 4,
            'url' => 'https://www.mobygames.com/game/bomberman',
            'thumbnail' => 'bomberman.png',
            'platform' => 'PC'
        ]);

        $gameTable->insert([
            'name' => 'The Legend of Zelda: A Link to the Past',
            'price' => 35,
            'ageRating' => '7',
            'genre' => 'Action',
            'description' => 'The Legend of Zelda: A Link to the Past is a top-down action game with puzzle-solving elements (similar to the original Legend of Zelda). Players assume the role of Link, and their goal is to rescue Princess Zelda and save the land of Hyrule. All combat in the game is action-oriented - the player can make the protagonist swing the sword at enemies with a press of a button, or spin the sword around for a more powerful attack by holding down the button until it is charged.',
            'copies' => 2,
            'url' => 'https://www.mobygames.com/game/legend-of-zelda-a-link-to-the-past',
            'thumbnail' => 'zelda-a-link-to-the-past.jpg',
            'platform' => 'XBOX'
        ]);

        $gameTable->insert([
            'name' => 'Duke Nukem',
            'price' => 25,
            'ageRating' => '12',
            'genre' => 'Action',
            'description' => 'The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.',
            'copies' => 2,
            'url' => 'https://www.mobygames.com/game/duke-nukem',
            'thumbnail' => 'duke-nukem.png',
            'platform' => 'PC'
        ]);

        $gameTable->insert([
            'name' => 'Wasteland',
            'price' => 30,
            'ageRating' => '16',
            'genre' => 'Role-Playing',
            'description' => 'The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.',
            'copies' => 1,
            'url' => 'https://www.mobygames.com/game/wasteland',
            'thumbnail' => 'wasteland.jpg',
            'platform' => 'PS4'
        ]);

        $gameTable->insert([
            'name' => 'Wasteland',
            'price' => 32,
            'ageRating' => '16',
            'genre' => 'Role-Playing',
            'description' => 'The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.',
            'copies' => 2,
            'url' => 'https://www.mobygames.com/game/wasteland',
            'thumbnail' => 'wasteland.jpg',
            'platform' => 'XBOX'
        ]);

        $gameTable->insert([
            'name' => 'Wasteland',
            'price' => 40,
            'ageRating' => '16',
            'genre' => 'Role-Playing',
            'description' => 'The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.',
            'copies' => 4,
            'url' => 'https://www.mobygames.com/game/wasteland',
            'thumbnail' => 'wasteland.jpg',
            'platform' => 'PC'
        ]);

        $gameTable->insert([
            'name' => 'Air Hockey',
            'price' => 36,
            'ageRating' => 'PG',
            'genre' => 'Action',
            'description' => 'In this simulation of the air hockey arcade game the player controls a mallet trying to hit he puck into the opponents goal. The game is played until seven goals are scored (Classic mode) or until the timer reaches zero (Timed mode). There are three difficulty settings. A variety of color choices for the playfield and the puck are available. The game supports two-player versus matches on a single device.',
            'copies' => 8,
            'url' => 'https://www.mobygames.com/game/air-hockey__',
            'thumbnail' => 'air-hockey.png',
            'platform' => 'PC'
        ]);

        $gameTable->insert([
            'name' => 'The Arrival',
            'price' => 16,
            'ageRating' => '18',
            'genre' => 'Action',
            'description' => 'You have a first person view with complete freedom of movement. The puzzles have a science fiction theme, involving either object usage or looking for details. A hint system helps adventure game rookies to get used to the process of puzzle-solving. The game is non-linear and can come to several different endings.',
            'copies' => 3,
            'url' => 'https://www.mobygames.com/game/arrival',
            'thumbnail' => 'the-arrival.jpg',
            'platform' => 'XBOX'
        ]);
    }
}
