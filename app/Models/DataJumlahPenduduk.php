<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJumlahPenduduk extends Model
{
    use HasFactory;
    protected $table = 'data_jumlah_penduduk';
    protected $fillable = ['rt', 'rw', 'laki-laki', 'perempuan'];
}
