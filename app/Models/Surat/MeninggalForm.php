<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeninggalForm extends Model
{
    use HasFactory;
    protected $table = 'meninggal_forms';
    protected $fillable = [
        'nama',
        'nik',
        'tgl',
        'di',
        'penyebab',
        'keperluan',
        'no',
        'suket',
        'saksi1',
        'saksi2',
        'note',
        'file',
        'status'
        
    ];
}
