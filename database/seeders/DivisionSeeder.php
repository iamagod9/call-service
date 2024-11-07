<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert(['name' => "AUDI", 'description' => 'Ауди', 'path' => 'VOIP/AUDI']);
        DB::table('divisions')->insert(['name' => "CC", 'description' => 'Чери', 'path' => 'VOIP/CC']);
        DB::table('divisions')->insert(['name' => "HVL", 'description' => 'Хавал', 'path' => 'VOIP/HVL']);
    }
}
