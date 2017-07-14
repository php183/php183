<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods_t',function(Blueprint $table){
            $table->increments('id');
            $table->integer('tid')->unique();
            $table->integer('sid')->unique();
            $table->string('title')->unique();
            $table->string('price')->unique();
            $table->integer('number')->unique();
            $table->string('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('goods_t');
    }
}
