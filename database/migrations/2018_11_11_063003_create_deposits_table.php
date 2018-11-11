<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('payment_method_id');
            $table->double('amount', 8, 2);
            $table->double('balance', 8, 2);
            $table->string('sender_name');
            $table->integer('unique_code');
            $table->enum('status', ['WAITING', 'ACCEPTED', 'FAILED', 'CANCELED', 'EXPIRED']);
            $table->timestamp('expired_date')->nullable();
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
        Schema::dropIfExists('deposits');
    }
}
