<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('work_id')->unsigned();
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');

            $table->integer('parcel')->nullable();
            $table->double('amount_received')->nullable();
            $table->string('status')->nullable();
            $table->date('inclusion_date')->nullable();
            $table->integer('ob_number')->nullable();
            $table->date('ob_date')->nullable();
            $table->double('value_rec')->nullable();
            $table->double('value_paid')->nullable();

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
        Schema::dropIfExists('summary_of_transfers');
    }
}
