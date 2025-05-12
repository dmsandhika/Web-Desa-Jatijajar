<?php

namespace Database\Seeders;

use App\Models\ConfigData;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Agama',
            'Jumlah Penduduk',
            'Pekerjaan',
            'Pendidikan',
            'Usia'
        ];
        $table = [
            'data_agama',
            'data_jumlah_penduduk',
            'data_pekerjaan',
            'data_pendidikan',
            'data_usia'
        ];

        foreach ($data as $index => $name) {
            ConfigData::create([
                'name' => $name,
                'connect_table' => $table[$index] 
            ]);
        }
    }
}
