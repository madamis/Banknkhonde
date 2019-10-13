<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction');
            $table->string('reason');
            $table->string('amount');
            $table->string('status');
            $table->enum('type', array('deposite','withdraw'));
            $table->unsignedBigInteger('account');
            $table->timestamps();
            // $table->primary('transaction');

            $table->foreign('account')->references('account')->on('accounts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
