<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
    	$password = Hash::make('12345678');
    	$sexes = array('male', 'female');
    	$groups = Group::all()->pluck('id')->toArray();
    	for ($i=0; $i < 50; $i++) { 
    		$name = $faker->name;
    		$username = explode(' ', $name);
    		$username = substr($username[0], 0,2).$username[1];
    		$sex = $faker->randomElement($sexes);
    		$group_id = $faker->randomElement($groups);

        	Member::create(["name"=>$name, "username"=>$username, "password"=>$password, "nrb"=>$faker->randomDigit, "sex"=>$sex, "dateofbirth"=>$faker->date, "group"=>$group_id]);
    		# code...
    	}
    }
}
