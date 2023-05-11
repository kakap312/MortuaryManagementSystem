<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
        DB::table('services')->insert([
            'serviceId'=> $id,
            'name'=>"Bathing",
            'fee'=>80,
            'per'=>"once",
            'createdAt'=>"24/03/2022",
            'updatedAt'=>""
        ]);
    }
    
}
