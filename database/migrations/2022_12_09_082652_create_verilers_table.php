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
        Schema::dropIfExists('verilers');
        Schema::create('verilers', function (Blueprint $table) {
            $table->id();
            $table->string('isin');
            $table->string('ticker');
            $table->string('shortname');
            $table->string('issuer');
            $table->string('country');
            $table->string('type');
            $table->string('currency');
            $table->text('other_details')->nullable();
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
        Schema::dropIfExists('verilers');
    }
};
