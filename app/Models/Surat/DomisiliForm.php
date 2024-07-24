<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliForm extends Model
{
    use HasFactory;
    protected $table = 'domisili_forms';

    protected $fillable = [
        'nama',
        'nik',
        'tempatlahir',
        'tgl',
        'kelamin',
        'agama',
        'pekerjaan',
        'keperluan',
        'no',
        'ktp',
        'alamat',
        'file',
        'status',
    ];
}