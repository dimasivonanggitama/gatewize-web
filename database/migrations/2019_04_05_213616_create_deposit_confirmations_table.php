<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_confirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deposit_id');
            $table->string('bank_tujuan');
            $table->string('bank_pengirim');
            $table->string('rekening_pengirim');
            $table->string('nama_pengirim');
            $table->double('jumlah', 8, 2);
            $table->date('tanggal_pengiriman');
            $table->string('bukti_pembayaran');
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('deposit_confirmations');
    }
}
