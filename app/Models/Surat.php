<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'data_surat';

    protected $fillable = [
        'jenis_surat',
        'data',
        'status',
        'note',
        'file'
    ];

    protected $casts = [
        'data' => 'array',
    ];
    protected $dates = ['deleted_at'];
}
