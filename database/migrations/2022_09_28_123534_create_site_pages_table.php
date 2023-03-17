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
        Schema::create('site_pages', function (Blueprint $table) {
            $table->id();
            $table->string('pagesid');
            $table->string('image')->nullable();
            $table->string('baslik')->nullable();
            $table->string('kisaaciklama')->nullable();
            $table->text('icerik')->nullable();
            $table->string('seobaslik')->nullable();
            $table->string('seoaciklama')->nullable();
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
        Schema::dropIfExists('site_pages');
    }
};
