<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Slot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('slots', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string("slotId",100)->index();
            $table->string("name",30)->index();
            $table->unsignedBigInteger('fridgeId');
            $table->foreign("fridgeId")->references("id")->on("fridges")->onDelete('cascade');
            $table->string("state",10)->default("free");
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
    }
}
