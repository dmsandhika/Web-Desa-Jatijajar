<?php

namespace App\Models;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author','slug','category_id','content', 'image' ];
    
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
