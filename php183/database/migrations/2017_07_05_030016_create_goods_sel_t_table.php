<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSelTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods_sel_t',function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('picture')->unque();
            $table->string('Sellers')->unque();
            $table->string('path')->unique();
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
        Schema::dropIfExists('goods_sel_t');
    }
}
