<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiForm extends Model
{
    use HasFactory;
    protected $table = 'rekomendasi_forms';
    protected $fillable = [
        'nik',
        'nama',
        'rekomendasi',
        'keperluan',
        'kk',
        'no',
        'note',
        'file',
        'status',
    ];
}