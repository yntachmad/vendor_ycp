<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            'group' => 'A',
            'description' => 'A items or suppliers that are very important to the organization because of its high spend value. Normally A items are those items for which an organization spends close to 80 or even 90% of its money. ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('groups')->insert([
            'group' => 'B',
            'description' => 'B items or suppliers are those that the organization spends about 10% to 15% of its money. These are not that high in priority but still may need to pay some attention. ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('groups')->insert([
            'group' => 'C',
            'description' => 'C items or suppliers are those where we spend very low. Usually we should have around 75% to 80% of suppliers in this category.   ',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

    }
}
