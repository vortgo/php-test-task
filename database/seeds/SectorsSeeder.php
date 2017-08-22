<?php

use Illuminate\Database\Seeder;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = \App\Models\Sector::count();

        if(!$count){
            for ($i = 0; $i < 12 ; $i++){
                \App\Models\Sector::create([
                    'name' => $i +1,
                ]);
            }
        }
    }
}
