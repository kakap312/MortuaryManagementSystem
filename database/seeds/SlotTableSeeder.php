<?php

use Illuminate\Database\Seeder;

class SlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        for ($i=1; $i <= 175; $i++) {
            $id = uniqid();
            $name = 'B'.$i; 
            DB::table('slots')->insert([
                'slotId'=> $id,
                'name'=>$name,
                'fridgeId'=>'6398d3af52f06',
                'state'=>"free"
            ]);
        }
        
    }
}
