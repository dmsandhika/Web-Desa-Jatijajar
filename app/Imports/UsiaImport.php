<?php

namespace App\Imports;

use App\Models\DataUsia;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsiaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->skip(1) as $row) 
        {
            DataUsia::create([
                'rw' => $row[1],
                'rt' => $row[2],
                '0-4' => $row[3],
                '5-9' => $row[4],
                '10-14' => $row[5],
                '15-19' => $row[6],
                '20-24' => $row[7],
                '25-29' => $row[8],
                '30-34' => $row[9],
                '35-39' => $row[10],
                '40-44' => $row[11],
                '45-49' => $row[12],
                '50-54' => $row[13],
                '55-59' => $row[14],
                '60-64' => $row[15],
                '65-69' => $row[16],
                '70-74' => $row[17],
                '>=75' => $row[18]
            ]);
        }
    }
}
