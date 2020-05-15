<?php

use Illuminate\Database\Seeder;
use App\Loan;
use App\Account;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $accounts = Account::all()->pluck('id')->toArray();
        $statuses = array('not payed', 'partily payed', 'fully payed' );
        for ($i=0; $i < 50; $i++) { 
        	$account_id = $faker->randomElement($accounts);
        	$status = $faker->randomElement($statuses);
        	Loan::create(['reason'=>$faker->text, 'amount'=>$faker->randomDigit(4), 'status'=>$status, 'duedate'=>$faker->date, 'account'=>$account_id]);
        }
    }
}