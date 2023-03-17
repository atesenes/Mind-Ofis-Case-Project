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
        Schema::create('site_borsa_bakiyelers', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('isinno');
            $table->integer('amount');
            $table->float('piece');
            $table->string('durum');
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
        Schema::dropIfExists('site_borsa_bakiyelers');
    }
};
