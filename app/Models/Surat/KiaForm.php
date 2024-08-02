<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KiaForm extends Model
{
    use HasFactory;
    protected $table = 'kia_forms';
    protected $fillable = [
        'nik',
        'nama',
        'anak',
        'akta',
        'kk',
        'foto',
        'no',
        'note',
        'file',
        'status',
    ];
}