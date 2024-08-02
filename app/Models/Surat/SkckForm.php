<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkckForm extends Model
{
    use HasFactory;
    protected $table = 'skck_forms';
    protected $fillable = [
        'nik',
        'nama',
        'ktp',
        'no',
        'note',
        'file',
        'status',
    ];
}
