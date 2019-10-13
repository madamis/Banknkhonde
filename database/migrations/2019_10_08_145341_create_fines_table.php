<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->bigIncrements('fine');
            $table->string('reason');
            $table->string('amount');
            $table->enum('status', array('not payed', 'partily payed', 'fully payed'));
            $table->date('duedate');
            $table->unsignedBigInteger('account');
            $table->timestamps();
            // $table->primary('fine');

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
        Schema::dropIfExists('fines');
    }
}
