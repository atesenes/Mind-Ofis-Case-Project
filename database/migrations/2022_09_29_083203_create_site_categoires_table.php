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
        Schema::create('site_categoires', function (Blueprint $table) {
            $table->id();
            $table->string('catid')->nullable();
            $table->string('topcatid')->nullable();
            $table->string('baslik')->nullable();
            $table->string('kisaaciklama')->nullable();
            $table->string('image')->nullable();
            $table->string('seobaslik')->nullable();
            $table->string('seoaciklama')->nullable();
            $table->string('dil')->nullable();
            $table->string('diletiket')->nullable();
            $table->string('seourl')->nullable();
            $table->string('anakategorimi')->nullable();
            $table->string('sira')->nullable();
            $table->string('menudurum')->nullable();
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
        Schema::dropIfExists('site_categoires');
    }
};
