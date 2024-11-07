<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(['name' => "1101", 'description' => 'Номер отдела 1']);
        DB::table('roles')->insert(['name' => "1102", 'description' => 'Номер отдела 2']);
        DB::table('roles')->insert(['name' => "1103", 'description' => 'Номер отдела 3']);
    }
}
