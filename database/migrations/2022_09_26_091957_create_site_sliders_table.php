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
        Schema::create('site_sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('sliderid');
            $table->string('baslik')->nullable();
            $table->string('image');
            $table->string('dislikmetin')->nullable();
            $table->string('dislik')->nullable();
            $table->string('kisaaciklama')->nullable();
            $table->string('seobaslik')->nullable();
            $table->string('seoaciklamasi')->nullable();
            $table->string('dil')->nullable();
            $table->string('sira')->nullable();
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
        Schema::dropIfExists('site_sliders');
    }
};
