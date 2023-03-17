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
        Schema::dropIfExists('site_kiralamas');
        Schema::create('site_kiralamas', function (Blueprint $table) {
            $table->id();
            $table->text('etkinlikkonusu')->nullable();
            $table->string('isimsoyisim')->nullable();
            $table->string('eposta')->nullable();
            $table->string('telefon')->nullable();
            $table->string('kisisayisi')->nullable();
            $table->string('tarih')->nullable();
            $table->string('saat')->nullable();
            $table->text('mesaj')->nullable();
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
        Schema::dropIfExists('site_kiralamas');
    }
};
