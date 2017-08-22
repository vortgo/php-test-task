<?php

use Illuminate\Database\Seeder;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = \App\Models\Match::count();
        if ($count) {
            return;
        }

        $period = new DatePeriod(
            new DateTime(),
            new DateInterval('P2D'),
            (new DateTime())->add(new DateInterval('P10D'))
        );
        $faker = Faker\Factory::create();
        foreach ($period as $date){
            /** @var DateTime $date */
            \App\Models\Match::create([
                'name' => "{$faker->city} vs {$faker->city}",
                'date_of_match' => $date->format('Y-m-d')
            ]);
        }
    }
}
