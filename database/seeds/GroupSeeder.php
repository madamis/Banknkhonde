<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
        for ($i=0; $i < 50; $i++) { 
        	Group::create([ "name"=>$faker->word, "motto"=>$faker->sentence, "description"=>$faker->text ]);
        }
    }
}
