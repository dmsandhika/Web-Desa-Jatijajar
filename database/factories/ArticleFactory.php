<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'author'=>fake()->name(),
            'content'=>fake()->paragraph(10),
            'slug'=> Str::slug(fake()->sentence()),
            'image'=>fake()->imageUrl(640, 480),
            'category_id'=>Category::factory(),
        ];
    }
}
