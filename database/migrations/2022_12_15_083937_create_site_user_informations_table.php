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
        Schema::create('site_user_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('picture')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable()->nullable()->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('account_number')->nullable();
            $table->string('brabch_code')->nullable();
            $table->string('btc')->nullable();
            $table->string('eth')->nullable();
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
        Schema::dropIfExists('site_user_informations');
    }
};
