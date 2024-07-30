<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehilanganForm extends Model
{
    use HasFactory;
    protected $table = 'kehilangan_forms';
    protected $fillable = [
        'nik',
        'nama',
        'barang',
        'lokasi',
        'ktp',
        'no',
        'note',
        'file',
        'status',
    ];
    
}