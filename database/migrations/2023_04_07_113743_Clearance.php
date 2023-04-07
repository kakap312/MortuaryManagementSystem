<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clearance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         //
         Schema::create('clearance', function (Blueprint $table){
            $table->string("clearanceId",100)->primary();
            $table->string("corpseId",100)->index();
            $table->string("status",20);
            $table->foreign("corpseId")->references("corpId")->on('corps')->onDelete('cascade');
            $table->date("createdAt",10);
            $table->date("updatedAt",10);
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
        Schema::dropIfExists('clearance');
    }
}
