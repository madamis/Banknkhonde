<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\Member;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $members = Member::all()->pluck('id')->toArray();
        for ($i=0; $i < 50; $i++) { 
        	$member_id = $faker->randomElement($members);
        	Contact::create(['phone'=>$faker->PhoneNumber, 'member'=>$member_id]);
        }
    }
}
