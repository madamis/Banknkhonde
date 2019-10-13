<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('loan');
            $table->string('reason');
            $table->string('amount');
            $table->enum('status', array('not payed', 'partily payed', 'fully payed'));
            $table->date('duedate');
            $table->unsignedBigInteger('account');
            $table->timestamps();
            // $table->primary('loan');

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
        Schema::dropIfExists('loans');
    }
}
