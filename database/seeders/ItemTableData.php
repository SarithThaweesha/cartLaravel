<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ItemTableData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'id'=>'1',
            'name'=>'Sarith',
            'email'=>'sarith@gmail.com',
            'DOB'=>'98/10/20',

        ]);
    }
}
