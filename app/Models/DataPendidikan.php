<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
    use HasFactory;
    protected $table = 'data_pendidikan';
    protected $fillable = ['rt', 'rw', 'belum_sekolah','belum_tamat_sd', 'sd', 'smp', 'sma', 'd1_3', 'akademi', 's1', 's2', 's3'];
}
