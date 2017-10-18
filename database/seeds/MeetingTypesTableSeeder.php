<?php

use Illuminate\Database\Seeder;
use App\MeetingType;

class MeetingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	MeetingType::truncate();

        $faker = \Faker\Factory::create();

        // -- Generate 3 Meeting Types
        $types = array("Thoroughbred","Greyhound","Harness");

        foreach ($types as $type) {
            MeetingType::create([
                'name' => $type
            ]);
        }

    }
}
