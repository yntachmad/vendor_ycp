<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sub_clasifications')->insert([
            'clasification_id' => 1,
            'clasification' => 'Waste Management',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_clasifications')->insert([
            'clasification_id' => 1,
            'clasification' => 'Stationary',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_clasifications')->insert([
            'clasification_id' => 2,
            'clasification' => 'Branding material',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_clasifications')->insert([
            'clasification_id' => 2,
            'clasification' => 'Agency',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
