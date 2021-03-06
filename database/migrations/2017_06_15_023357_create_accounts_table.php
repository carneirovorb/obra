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
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('work_id')->unsigned();
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');

            $table->string('bank_name')->nullable();
            $table->string('agency')->nullable();
            $table->integer('account_number')->nullable();
            $table->string('contracted_bank_name')->nullable();
            $table->string('contracted_agency')->nullable();
            $table->integer('contracted_account')->nullable();
            $table->text('pendency')->nullable();
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
        Schema::dropIfExists('convention_accounts');
    }
}
