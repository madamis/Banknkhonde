<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('account');
            $table->string('name');
            $table->string('numnber');
            $table->float('balance');
            $table->unsignedBigInteger('member');
            $table->date('lastactivitydate');
            $table->timestamps();
            // $table->primary('account');

            $table->foreign('member')->references('member')->on('members');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
