<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PositionsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
            $company = $faker->company;
	        DB::table('positions')->insert([
                'company_id' => rand(1, 200),
                'person_id' => rand(1, 200),
                'name' => $faker->jobTitle. $faker->randomLetter,
                'phone' => $faker->phoneNumber,
	        ]);
	    }
    }
}
