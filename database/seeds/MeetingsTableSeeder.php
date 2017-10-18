<?php

use Illuminate\Database\Seeder;
use App\Meeting;
use App\MeetingType;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Meeting::truncate();

        $faker = \Faker\Factory::create();

        // -- Generate 3 Meets and their type. Hardcoded Id's to guarantee atleast one race of each type
        Meeting::create([
            'name' => "Canterbury",
            'type_id' => 1,
        ]);

        Meeting::create([
            'name' => "Bathurst",
            'type_id' => 3,
        ]);

        Meeting::create([
            'name' => "Albion Park",
            'type_id' => 2,
        ]);

        Meeting::create([
            'name' => "Ipswich",
            'type_id' => 1,
        ]);

        Meeting::create([
            'name' => "Geelong",
            'type_id' => 3,
        ]);

    }
}
