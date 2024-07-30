<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EktpForm extends Model
{
    use HasFactory;
    protected $table = 'ektp_forms';
    protected $fillable = [
        'nik',
        'nama',
        'kk',
        'no',
        'note',
        'file',
        'status',
    ];
    
}