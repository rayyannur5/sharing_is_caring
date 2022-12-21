<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_donasi_guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_id');
            $table->string('name');
            $table->string('nominal');
            $table->string('payment_method');
            $table->foreign('donasi_id')->references('id')->on('donasis')->onDelete('cascade');
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
        Schema::dropIfExists('transaksi_donasi_guests');
    }
};
