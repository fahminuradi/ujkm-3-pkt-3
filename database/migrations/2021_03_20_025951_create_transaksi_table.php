<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_outlet')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->date('tgl_masuk');
            $table->date('batas');
            $table->date('tgl_bayar');
            $table->enum('status',['baru','proses','selesai','diambil']);
            $table->enum('bayar',['lunas','belum lunas']);
            $table->timestamps();


            $table->foreign('id_outlet')->references('id')->on('outlet')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
