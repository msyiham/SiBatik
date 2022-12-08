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
        Schema::create('produkvarian', function (Blueprint $table) {
            $table->increments("id_varian")->unique();
            $table->integer("id_product")->unsigned();
            $table->string("ukuran");
            $table->integer("stok");
            $table->integer("harga");
            $table->timestamps();

            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produkvarian');
    }
};
