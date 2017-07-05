<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsPicTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods_pic_t',function(Blueprint $table){
            $table->increments('id');
            $table->integer('lid')->unique();
            $table->integer('fid')->unique();
            $table->string('picture')->default('dafault.jpg');
            $table->integer('cid')->unique();
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
        Schema::dropIfExists('goods_pic_t');
    }
}
