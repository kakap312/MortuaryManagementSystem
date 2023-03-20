<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Corps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('corps', function (Blueprint $table){
            $table->string("corpId",100)->primary();
            $table->date("admissionDate",10);
            $table->string("name",30)->index();
            $table->smallInteger("age");
            $table->string("sex",5);
            $table->string("hometown",20);
            $table->string("relativeName",30);
            $table->string("relativeContactOne",30);
            $table->string("relativeContactTwo",30);
            $table->date("collectionDate",10);
            $table->string("remarks",200);
            $table->string("releasedBy",200);
            $table->date("updatedAt");
            $table->string("fridgeId",100)->index();
            $table->string("slotId",100)->index();
            $table->foreign("slotId")->references("slotId")->on('slots')->onDelete('cascade');
            $table->foreign("fridgeId")->references("fridgeId")->on('fridges')->onDelete('cascade');
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
        Schema::dropIfExists('corps');
    }
}
