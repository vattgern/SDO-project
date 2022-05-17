<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'студент',
            'slug' => 'student'
        ]);

        DB::table('roles')->insert([
            'role' => 'родитель',
            'slug' => 'parent'
        ]);

        DB::table('roles')->insert([
            'role' => 'учитель',
            'slug' => 'teacher'
        ]);

        DB::table('roles')->insert([
            'role' => 'куратор',
            'slug' => 'curator'
        ]);

        DB::table('roles')->insert([
            'role' => 'админ',
            'slug' => 'admin'
        ]);

        DB::table('roles')->insert([
            'role' => 'помошник админа',
            'slug' => 'admin helper'
        ]);
    }
}
