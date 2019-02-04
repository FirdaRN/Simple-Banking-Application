<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // id, accountnumber, type, description
        Schema::create('accounts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            // $table->increments('id');
            $table->integer('account_number', 10)->unique();
            $table->integer('customer_id');
            // $table->foreign('customer_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('type');
            $table->string('description');
            $table->timestamps();

            // $table->primary(['id']);
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
