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
        Schema::create('site_products', function (Blueprint $table) {
            $table->id();
            $table->string('productid')->nullable();
            $table->string('baslik')->nullable();
            $table->text('icerik')->nullable();
            $table->text('ozet')->nullable();
            $table->text('ozellikleri')->nullable();
            $table->string('seobaslik')->nullable();
            $table->string('seoaciklama')->nullable();
            $table->string('kategori')->nullable();
            $table->string('image')->nullable();
            $table->string('sira')->nullable();
            $table->string('seourl');
            $table->string('fiyat')->nullable();
            $table->string('dil')->nullable();
            $table->string('diletiket')->nullable();
            $table->string('anasayfadurum')->nullable();
            $table->string('footerdurum')->nullable();
            $table->string('durum')->nullable();
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
        Schema::dropIfExists('site_products');
    }
};
