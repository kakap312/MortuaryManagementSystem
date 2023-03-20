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
            $table->string("slotId",100)->primary();
            $table->string("name",30)->index();
            $table->string("fridgeId",30)->index();
            $table->foreign("fridgeId")->references("fridgeId")->on("fridges")->onDelete('cascade');
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
