<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Billing extends Migration
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
         Schema::create('billings', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('billId')->index();
            $table->unsignedBigInteger("corpId");
            $table->string("billfor",100);
            $table->smallInteger("dueDays");
            $table->smallInteger("extraDays");
            $table->double("fee",8,2);
            $table->double("amount",8,2);
            $table->foreign("corpId")->references("id")->on('corps')->onDelete('cascade');
            $table->date("createdAt",10);
            $table->date("updatedAt",10);
        });
        Schema::create('billingservices', function (Blueprint $table){
            $table->bigIncrements("id");
            $table->string("billServiceId")->index();
            $table->unsignedBigInteger("billId");
            $table->unsignedBigInteger("serviceId");
            $table->foreign("billId")->references("id")->on('billings')->onDelete('cascade');
            $table->foreign("serviceId")->references("id")->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('billings');
        Schema::dropIfExists('billingservices');
    }
}
