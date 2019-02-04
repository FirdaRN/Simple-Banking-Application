<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // id type name, cusid, amount, date time
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->string('customer_id');
            // $table->foreign('customer_id')->references('account_number')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('debit');
            $table->integer('credit');
            $table->integer('amount');
            $table->string('account');
            $table->timestamps();
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
