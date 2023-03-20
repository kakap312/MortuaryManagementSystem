<?php

use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $id = uniqid();
        DB::table('billings')->insert([
            'billId'=> $id,
            'name'=>"B",
            'location'=>"first floor room 4",
            'state'=>"free"
        ]);
    }

    
}
