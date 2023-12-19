<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            DB::table('books')->insert([
                'id'=>'1',
                'name'=>'Lord of the rings',
                'author'=>'J.R.R tolkien',
                'image'=>'LOTR.jpg',
                'price'=>'1000',
                'category' => 'Science Fiction',
    
            ]);

            DB::table('books')->insert([
                'id'=>'2',
                'name'=>'Harry Potter',
                'author'=>'J.K.Rowling',
                'image'=>'Hp.jpg',
                'price'=>'1500',
                'category' => 'Science Fiction',
    
            ]);

            DB::table('books')->insert([
                'id'=>'3',
                'name'=>'GOT',
                'author'=>'G.R.R.Martin',
                'image'=>'got.jpg',
                'price'=>'2000',
                'category' => 'Science Fiction',
    
            ]);
        
            DB::table('books')->insert([
                'id'=>'4',
                'name'=>'Hobbit',
                'author'=>'J.R.R tolkien',
                'image'=>'hobbit.jpg',
                'price'=>'1700',
                'category' => 'Science Fiction',
    
            ]);
        
        
        
    }
}
