<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SktmForm extends Model
{
    use HasFactory;
    protected $table = 'sktm_forms';
    protected $fillable = [
        'nama',
        'nik',
        'kk',
        'keperluan',
        'no',
        'note',
        'file',
        'status'
    ];
}
