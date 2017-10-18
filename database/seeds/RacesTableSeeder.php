<?php

use Illuminate\Database\Seeder;
use App\Race;
use App\RaceCompetitor;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Race::truncate();
        RaceCompetitor::truncate();

        $faker = \Faker\Factory::create();

        // -- Generate 5 races ensuring all Meetings/Types appear
        for ($i = 0; $i < 5; $i++) {

        	// -- Create the race
            $race = Race::create([
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'closing_time' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 days', $timezone = date_default_timezone_get()),
                'meeting_id' => $i + 1
            ]);

            // -- Associate competitors
            for ($c = 0; $c < 8; $c++) {
	            RaceCompetitor::create([
	                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
	                'position' => $c + 1,
	                'race_id' => $race->id
	            ]);
            }
            
        }

    }
}
