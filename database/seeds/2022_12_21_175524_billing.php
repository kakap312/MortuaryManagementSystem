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
            $table->string("billId",100)->primary();
            $table->string("corpId",100)->index();
            $table->string("billfor",100);
            $table->double("amount",8,2);
            $table->foreign("corpId")->references("corpId")->on('corps')->onDelete('cascade');
            $table->date("createdAt",10);
            $table->date("updatedAt",10);
        });
        Schema::create('billingservices', function (Blueprint $table){
            $table->string("billServiceId",100)->primary();
            $table->string("billId",100)->index();
            $table->string("serviceId",100)->index();
            $table->foreign("billId")->references("billId")->on('billings')->onDelete('cascade');
            $table->foreign("serviceId")->references("serviceId")->on('services')->onDelete('cascade');
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
