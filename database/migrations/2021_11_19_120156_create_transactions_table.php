<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedBigInteger('pasien_id');
            $table->enum('status', ['Sudah Bayar', 'Blom Bayar']);
            $table->enum('ket', ['Membeli Obat', 'Rekam Medis']);
            $table->unsignedBigInteger('pengguna_id');
            $table->timestamps();
            $table->foreign('pasien_id')->references('id')->on('pasien')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pengguna_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');

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
