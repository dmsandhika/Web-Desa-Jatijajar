<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeramaianForm extends Model
{
    use HasFactory;
    protected $table = 'keramaian_forms';
    protected $fillable = [
        'nik',
        'nama',
        'acara',
        'tanggal_mulai',
        'jam_mulai',
        'tanggal_berakhir',
        'jam_berakhir',
        'hiburan',
        'lokasi',
        'no',
        'note',
        'file',
        'status',
    ];
}