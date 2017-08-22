<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SectorsSeeder::class);
         $this->call(RowsSeeder::class);
         $this->call(PlacesSeeder::class);
         $this->call(MatchesSeeder::class);
    }
}
