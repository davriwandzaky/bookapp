<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        DB::table('books')->insert([
            'title' => 'War of The Worlds', 
            'description' => 'A science fiction masterpiece about Martians invading London.',
            'author' => 'H.G Wells',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'title' => 'A Wrinkle in Time', 
            'description' => 'A young girls goes on a mission to save her father who has gone missing after working on a mysterious project called tesseract.',
            'author' => 'Madeleine L\'Engle',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
