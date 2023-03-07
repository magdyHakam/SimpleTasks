<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i=1; $i <= 100; $i++) {
            $data[] = ['name'=>'Admin'.$i.' name', 'is_admin'=> 1];
        }

        // User::insert($data); // Eloquent approach
        DB::table('users')->insert($data); // Query Builder approach
    }
}
