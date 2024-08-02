<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelumnikahForm extends Model
{
    use HasFactory;
    protected $table = 'belumnikah_forms';

    protected $fillable = [
        'nama',
        'nik',
        'keperluan',
        'no',
        'ktp',
        'kk',
        'file',
        'status',
    ];
}
