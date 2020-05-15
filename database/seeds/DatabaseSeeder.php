<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(FineSeeder::class);
        $this->call(LoanSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
