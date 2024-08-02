<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NikahForm extends Model
{
    use HasFactory;
    protected $table = 'nikah_forms';
    protected $fillable = [
        'nik',
        'nama',
        'ktp_pemohon',
        'ktp_ayah',
        'ktp_ibu',
        'ktp_calon',
        'kk_pemohon',
        'kk_calon',
        'tgl',
        'ktp_wali',
        'status_wali',
        'no',
        'note',
        'file',
        'status',
    ];
}