<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i=1; $i <= 10000; $i++) {
            $data[] = ['name'=>'User'.$i.' name', 'is_admin'=> 0];
        }

        // User::insert($data); // Eloquent approach
        DB::table('users')->insert($data); // Query Builder approach
    }
}
