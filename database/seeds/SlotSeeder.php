<?php

use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        for ($i=1; $i <= 200; $i++) {
            $id = uniqid();
            $name = 'B'.$i; 
            DB::table('slots')->insert([
                'slotId'=> $id,
                'name'=>$name,
                'fridgeId'=>3,
                'state'=>"free"
            ]);
        }
        
    }
}
