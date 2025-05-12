<?php

namespace App\Imports;

use App\Models\DataJumlahPenduduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class JumlahPendudukImport implements ToCollection
{
     public function collection(Collection $rows)
    {
        foreach ($rows->skip(1) as $row) 
        {
            DataJumlahPenduduk::create([
                'rw' => $row[1],
                'rt' => $row[2],
                'laki-laki' => $row[3],
                'perempuan' => $row[4]
            ]);
        }
    }
}
