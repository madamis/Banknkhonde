<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use App\Account;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
    	$types = array('deposite','withdraw');
    	$status = array('YOUNG','MATURE','DUE','OVERDUE');
    	$accounts = Account::all()->pluck('id')->toArray();

        for ($i=0; $i < 50; $i++) { 

        	Transaction::create(['reason'=>$faker->text, 'amount'=>$faker->randomDigit, 'status'=>$faker->randomElement($status), 'type'=>$faker->randomElement($types), 'account'=>$faker->randomElement($accounts)]);
        }
    }
}
