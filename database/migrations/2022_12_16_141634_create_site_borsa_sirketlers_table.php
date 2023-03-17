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
        Schema::create('site_borsa_sirketlers', function (Blueprint $table) {
            $table->id();
            $table->string('sirketid');
            $table->string('sirketname');
            $table->text('aciklama')->nullable();
            $table->integer('durum');
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
        Schema::dropIfExists('site_borsa_sirketlers');
    }
};
