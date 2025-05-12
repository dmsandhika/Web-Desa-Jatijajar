<?php

namespace App\Imports;

use App\Models\DataAgama;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class AgamaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->skip(1) as $row) 
        {
            DataAgama::create([
                'rw' => $row[1],
                'rt' => $row[2],
                'islam' => $row[3],
                'kristen' => $row[4],
                'katolik' => $row[5],
                'hindu' => $row[6],
                'budha' => $row[7],
                'konghucu' => $row[8],
            ]);
        }
    }
}
