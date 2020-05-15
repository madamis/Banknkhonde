<?php

use Illuminate\Database\Seeder;
use App\Account;
use App\Member;

class AccountSeeder extends Seeder
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
        	Account::create([
        'name'=>$faker->name,
        'numnber'=>$faker->randomDigit(4),
        'balance'=>$faker->randomDigit(4),
        'member'=>$member_id,
        'lastactivitydate'=>$faker->date
    ]);
        }
    }
}
