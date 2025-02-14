<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('vendors')->insert([
            'group_id' => 2,
            'category_id' => 2,
            'clasification_id' => 2,
            'subClasification_id' => 2,
            'description' => 'Solar Lamp',
            'typeCompany_id' => 9,
            'supplier_name' => 'ECS Raya Indonesia (Schneider Electric distributor)',
            'contact_person' => 'Michael Tjan',
            'contact_phone' => '0811 8899 007',
            'contact_email' => 'arifin.limbong@schneider-electric.com; michaeltjan@yahoo.com; michael@esc.co.id',
            'website' => 'www.schneider-electric.com',
            'address' => 'Jl Pinangsia III No 25 Tamansari Jakarta Bar. 11110',
            'province_id' => 1,
            'city_id' => 1,
            'legal_document' => '',
            'tax_register' => 'no',
            'Terms_condition' => 'no',
            'typebank_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
