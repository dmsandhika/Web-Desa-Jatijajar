<?php

namespace App\Imports;

use App\Models\DataPekerjaan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PekerjaanImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->skip(1) as $row) 
        {
            DataPekerjaan::create([
                'name' => $row[1],
                'laki-laki' => $row[2],
                'perempuan' => $row[3]
            ]);
        }
    }
}
