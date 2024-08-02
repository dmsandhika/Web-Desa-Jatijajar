<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsahaForm extends Model
{
    use HasFactory;
    protected $table = 'usaha_forms';
    protected $fillable = [
        'nama',
        'nik',
        'usaha',
        'tahun',
        'alamat',
        'keperluan',
        'ktp',
        'no',
        'note',
        'file',
        'status'
    ];
}
