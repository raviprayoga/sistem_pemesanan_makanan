<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_meja');
            $table->bigInteger('makanan_id')->unsigned();
            $table->foreign('makanan_id')->references('id')->on('food');
            $table->bigInteger('minuman_id')->unsigned();
            $table->foreign('minuman_id')->references('id')->on('drinks');
            $table->string('no_pesanan');
            $table->integer('total_price');
            $table->enum('status', ['active', 'not_active'])->default('active');
            $table->bigInteger('created_by_id')->unsigned();
            $table->foreign('created_by_id')->references('id')->on('users');
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
        Schema::dropIfExists('pesanans');
    }
}
