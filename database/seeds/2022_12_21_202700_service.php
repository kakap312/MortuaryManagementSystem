<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Service extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('services', function (Blueprint $table){
            $table->bigIncrements("id");
            $table->string("serviceId")->index();
            $table->string("name",100);
            $table->double("regularFee",8,2);
            $table->double("vipFee",8,2);
            $table->string("per",100);
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
        Schema::dropIfExists('services');
    }
}
