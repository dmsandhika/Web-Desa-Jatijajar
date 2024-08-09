<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LahirForm extends Model
{
    use HasFactory;
    protected $table = 'lahir_forms';
    protected $fillable = [
        'nama',
        'nik',
        'anak',
        'keperluan',
        'no',
        'suket',
        'ktp_ayah',
        'ktp_ibu',
        'surat_nikah',
        'saksi1',
        'saksi2',
        'note',
        'file',
        'status',
    ];
}