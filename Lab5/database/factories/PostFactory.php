<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as FakerFactory;

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
        $faker = FakerFactory::create();

        return [
            'title' => $faker->word(),
            'description' => $faker->word(),
            'image' => $faker->image('public/assets/posts/images', 640, 480, null, false),
            'user_id' => User::all()->random()->id
        ];
    }
}
