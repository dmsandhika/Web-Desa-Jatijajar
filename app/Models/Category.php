<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name', 'slug'];
    
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    public static function createSlug($name)
    {
        // Convert the name to a slug format
        $slug = Str::slug($name);

        // Check if the slug already exists and append a number if necessary
        $originalSlug = $slug;
        $count = 1;
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        return $slug;
    }
}
