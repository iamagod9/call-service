<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(['name' => "admin", 'slug' => Str::slug('Администратор', '-', 'ru')]);
        DB::table('roles')->insert(['name' => "manager", 'slug' => Str::slug('Менеджер', '-', 'ru')]);
        DB::table('roles')->insert(['name' => "user", 'slug' => Str::slug('Пользователь', '-', 'ru')]);
    }
}
