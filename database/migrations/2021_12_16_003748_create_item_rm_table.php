<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_rm', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->integer('price');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('rekam_medis_id');
            $table->timestamps();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_rm');
    }
}
