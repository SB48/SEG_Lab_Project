<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GamesSeeder::class);
        $this->call(SocietyRulesSeeder::class);
        $this->call(MembersSeeder::class);
    }
}
