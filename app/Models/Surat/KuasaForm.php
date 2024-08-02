<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuasaForm extends Model
{
    use HasFactory;
    protected $table = 'kuasa_forms';
    protected $fillable = [
        'nik',
        'nama',
        'ktp_pemberi',
        'no',
        'isi_kuasa',
        'ktp_penerima',
        'hubungan',
        'note',
        'file',
        'status',
    ];
}
