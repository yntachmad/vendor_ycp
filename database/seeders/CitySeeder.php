<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('cities')->insert([
            'province_id' => 1,
            'city' => 'Jakarta Barat',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
