<?php

use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = \App\Models\Place::count();
        if ($count) {
            return;
        }

        $rows = \App\Models\Row::all();
        foreach ($rows as $row) {
            for ($i = 0; $i < 20; $i++) {
                \App\Models\Place::create([
                    'row_id' => $row->id,
                    'name'   => $i + 1
                ]);
            }
        }
    }
}
