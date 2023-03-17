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
        Schema::create('site_blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blogid');
            $table->string('baslik')->nullable();
            $table->string('image')->nullable();
            $table->string('kisaaciklama')->nullable();
            $table->text('icerik')->nullable();
            $table->text('ozet')->nullable();
            $table->string('seobaslik')->nullable();
            $table->text('seoaciklama')->nullable();
            $table->string('dil')->nullable();
            $table->string('diletiket')->nullable();
            $table->string('seourl')->nullable();
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
        Schema::dropIfExists('site_blogs');
    }
};
