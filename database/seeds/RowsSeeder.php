<?php

use Illuminate\Database\Seeder;

class RowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = \App\Models\Row::count();
        if ($count) {
            return;
        }
        $rowsRange = range('A', 'Z');
        $sectors = \App\Models\Sector::all();

        foreach ($sectors as $sector) {
            foreach ($rowsRange as $rowName) {
                \App\Models\Row::create([
                    'name'      => $rowName,
                    'sector_id' => $sector->id
                ]);
            }
        }

    }
}
