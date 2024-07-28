<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\category;
use App\Models\Post;
use App\Models\tag;

class PostFactory extends Factory
{
    public function definition(): array
    {
        //define array of photos
        $thumbnails = [ '1_kUKiJUFeCs4rKjjGNUtvUQ.png','Best-IDE-For-React.jpg','download.png','fronend.png','What-is-MySQL-2.jpg'];
        $categories = category::pluck('id')->toArray();
        //fake items to random item
        return [
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
            $post->tags()->sync(fake()->randomElements($tags, 2));
        });
    }
}
