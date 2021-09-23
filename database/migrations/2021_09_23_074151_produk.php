<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('tbl_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk');
            $table->string('varian');
            $table->bigInteger('stok_produk');
            $table->bigInteger('harga_satuan');
            $table->string('dekripsi');
            $table->string('kategori');
            $table->string('foto');
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
        Schema::dropIfExists('tbl_produk');
    }
}
