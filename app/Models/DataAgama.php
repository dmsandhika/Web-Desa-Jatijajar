<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAgama extends Model
{
    use HasFactory;
    protected $table = 'data_agama';
    protected $fillable = ['rt', 'rw', 'islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu'];
}
