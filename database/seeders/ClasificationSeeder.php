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
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Branding',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Catering',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Communication',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Construction',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Consultancy',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Customs Clearance',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Educational Institution',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Equipment',
        ]);
        DB::table('clasifications')->insert([
            'clasification' => 'Finance',
        ]);
    }
}
