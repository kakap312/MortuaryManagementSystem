<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FridgesTableSeeder extends Seeder
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
        DB::table('fridges')->insert([
            'fridgeId'=> $id,
            'name'=>"A",
            'location'=>"first floor room 4",
            'state'=>"free"
        ]);
    }
}
