<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clasifications')->insert([
            'clasification' => 'Administration',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Branding',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Catering',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Communication',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Construction',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Consultancy',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Customs Clearance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Educational Institution',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Equipment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Finance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
