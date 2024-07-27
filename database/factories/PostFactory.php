<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\category;
use App\Models\Post;
use App\Models\tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $thumbnails = [ '1_kUKiJUFeCs4rKjjGNUtvUQ.png','Best-IDE-For-React.jpg','download.png','fronend.png','What-is-MySQL-2.jpg'];
        $categories = category::pluck('id')->toArray();
        return [
            //
            // 'user_id' => 1,
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'thumbnail' => 'uploads/'.fake()->randomElement($thumbnails),
            'category_id' =>fake()->randomElement($categories),

        ];
    }
    public function configure(): static
    {
        $tags = tag::pluck('id')->toArray();

        return $this->afterCreating(function (Post $post) use($tags) {
            // ...
            $post->tags()->sync(fake()->randomElements($tags, 2));

        });
    }
}
