<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pos')->nullable();
            $table->foreign('id_pos')->references('id')->on('pos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->double('price_actual')->nullable();
            $table->string('currency_actual')->default('eur');
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
        Schema::dropIfExists('positem');
    }
}
