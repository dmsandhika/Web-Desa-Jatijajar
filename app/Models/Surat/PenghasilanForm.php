<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghasilanForm extends Model
{
    use HasFactory;
    protected $table = 'penghasilan_forms';
    protected $fillable = [
        'nik',
        'nama',
        'usaha',
        'gaji',
        'keperluan',
        'no',
        'note',
        'file',
        'status',
    ];
}
