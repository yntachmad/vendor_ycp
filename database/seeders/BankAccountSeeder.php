<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('bank_accounts')->insert([
            'bankType' => 'No Information',
        ]);

        DB::table('bank_accounts')->insert([
            'bankType' => 'Commercial',
        ]);

        DB::table('bank_accounts')->insert([
            'bankType' => 'Personal',
        ]);
    }
}
