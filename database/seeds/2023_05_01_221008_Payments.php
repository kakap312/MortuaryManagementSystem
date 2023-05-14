<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payments', function (Blueprint $table){
            $table->bigIncrements("id");
            $table->string("paymentId",100)->index();
            $table->double("amount",8,2);
            $table->unsignedBigInteger("billId");
            $table->string("description",100);
            $table->foreign("billId")->references("id")->on('billings')->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
}
