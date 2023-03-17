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
        Schema::create('site_contants', function (Blueprint $table) {
            $table->id();
            $table->string('siteeposta')->nullable();
            $table->string('siteadres')->nullable();
            $table->string('sitetelno')->nullable();
            $table->string('siteikincitelno')->nullable();
            $table->string('sitewhatsapp')->nullable();
            $table->string('sitefacebook')->nullable();
            $table->string('sitetwitter')->nullable();
            $table->string('siteinstagram')->nullable();
            $table->string('siteyoutube')->nullable();
            $table->string('sitelinkedin')->nullable();
            $table->text('siteharita')->nullable();
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
        Schema::dropIfExists('site_contants');
    }
};
