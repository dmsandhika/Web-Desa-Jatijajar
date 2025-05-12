<?php

namespace App\Imports;

use App\Models\DataPendidikan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PendidikanImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->skip(1) as $row) 
        {
            DataPendidikan::create([
                'rw' => $row[1],
                'rt' => $row[2],
                'belum_sekolah' => $row[3],
                'belum_tamat_sd' => $row[4],
                'sd' => $row[5],
                'smp' => $row[6],
                'sma' => $row[7],
                'd1_3' => $row[8],
                'akademi' => $row[9],
                's1' => $row[10],
                's2' => $row[11],
                's3' => $row[12],
            ]);
        }
    }
}
