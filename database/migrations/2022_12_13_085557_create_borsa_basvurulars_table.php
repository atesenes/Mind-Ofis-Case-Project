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
        Schema::create('borsa_basvurulars', function (Blueprint $table) {
            $table->id();
            $table->string('isin');
            $table->string('position_size');
            $table->string('interest_side');
            $table->string('lastname_contact');
            $table->string('email_contact');
            $table->string('phone_contact');
            $table->string('company');
            $table->string('comments');
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
        Schema::dropIfExists('borsa_basvurulars');
    }
};
