<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SangreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DEA 1.1
        DB::table('sangre')->insert([
            'id_Sangre' => 1,
            'tipo_Sangre' => '1.1',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 2,
            'tipo_Sangre' => '1.1',
            'factorRH' => '-',
        ]);

        // DEA 1.2
        DB::table('sangre')->insert([
            'id_Sangre' => 3,
            'tipo_Sangre' => '1.2',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 4,
            'tipo_Sangre' => '1.2',
            'factorRH' => '-',
        ]);

        // DEA 2
        DB::table('sangre')->insert([
            'id_Sangre' => 5,
            'tipo_Sangre' => '2',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 6,
            'tipo_Sangre' => '2',
            'factorRH' => '-',
        ]);

        // DEA 3
        DB::table('sangre')->insert([
            'id_Sangre' => 7,
            'tipo_Sangre' => '3',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 8,
            'tipo_Sangre' => '3',
            'factorRH' => '-',
        ]);

        // DEA 4
        DB::table('sangre')->insert([
            'id_Sangre' => 9,
            'tipo_Sangre' => '4',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 10,
            'tipo_Sangre' => '4',
            'factorRH' => '-',
        ]);

        // DEA 5
        DB::table('sangre')->insert([
            'id_Sangre' => 11,
            'tipo_Sangre' => '5',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 12,
            'tipo_Sangre' => '5',
            'factorRH' => '-',
        ]);

        // DEA 6
        DB::table('sangre')->insert([
            'id_Sangre' => 13,
            'tipo_Sangre' => '6',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 14,
            'tipo_Sangre' => '6',
            'factorRH' => '-',
        ]);

        // DEA 7
        DB::table('sangre')->insert([
            'id_Sangre' => 15,
            'tipo_Sangre' => '7',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 16,
            'tipo_Sangre' => '7',
            'factorRH' => '-',
        ]);

        // DEA 8
        DB::table('sangre')->insert([
            'id_Sangre' => 17,
            'tipo_Sangre' => '8',
            'factorRH' => '+',
        ]);

        DB::table('sangre')->insert([
            'id_Sangre' => 18,
            'tipo_Sangre' => '8',
            'factorRH' => '-',
        ]);
    }
}
