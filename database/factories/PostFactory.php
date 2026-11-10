<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6, true);
        return [
            'user_id' => User::factory(),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
            'title' => $title,
            'slug' => Str::slug($title),
            'cover' => null, // no upload in seeds; the listing handles null
            'content' => collect(fake()->paragraphs(5))
                ->map(fn ($p) => "<p>{$p}</p>")
                ->implode(''),
            'is_active' => fake()->boolean(85),
            'views' => fake()->numberBetween(0, 5000),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}
