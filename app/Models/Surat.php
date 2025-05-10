<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'data_surat';

    protected $fillable = [
        'jenis_surat',
        'data',
        'status',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
