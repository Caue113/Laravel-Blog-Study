<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(),
            "subtitle" => $this->faker->sentence(18),
            "tags" => "Novel, Travel, Mathematics, Statistics, Literature, Programming",
            "content" => $this->faker->realText(150),
            "owner" => $this->faker->name(),
            "created_at" => date("d/m/Y H:i:s", time()),
            "updated_at" => date("d/m/Y H:i:s", time())
        ];
    }
}
