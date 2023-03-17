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
        Schema::create('site_smtps', function (Blueprint $table) {
            $table->id();
            $table->string('smtpport')->nullable();
            $table->string('smtpgonderibasligi')->nullable();
            $table->string('smtpserver')->nullable();
            $table->string('smtpprotokol')->nullable();
            $table->string('smtpeposta')->nullable();
            $table->string('smtpsifre')->nullable();
            $table->string('smtptesteposta')->nullable();
            $table->string('smtpiletilecekeposta')->nullable();
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
        Schema::dropIfExists('site_smtps');
    }
};
