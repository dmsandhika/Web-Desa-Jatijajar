<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSurat extends Model
{
    use HasFactory;

    protected $table = 'config_surat';
    protected $fillable = ['name', 'value'];

    protected $casts = [
        'value' => 'array',
    ];

}
