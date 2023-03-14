<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TasksSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($j=0; $j < 10000; $j++) {
            $data = [];
            for ($i=1; $i <= 10000; $i++) {
                $data[] = ['title'=>'Task'.($i+$j*10000).' name', 'description'=>'Task'.($i+$j*10000).' Description', 'assigned_by_id'=> rand(1,100), 'assigned_to_id'=> rand(101,10100)];
            }

            // User::insert($data); // Eloquent approach
            DB::table('tasks')->insert($data); // Query Builder approach
        }
    }
}
