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
        //Generate CSV Data Randomly
        $TAGS = ["Novel", "Travel", "Mathematics", "Statistics", "Literature", "Programming", "Self Story", "Art", "Design", "Music", "Illustration", "Joke", "Web Design", "Web Development", "Photography", "News", "Guide", "Tutorial"];
        $attempts = rand(1, 5); //1 to 5 tags can be used
        $tags = [];

        for ($i=0; $i < $attempts ; $i++) { 
            $tag = $TAGS[rand(0, sizeof($TAGS) - 1)];
            if(array_search($tag, $tags) === false){
                array_push($tags, $tag);
            }
        }

        $tagsCsv = implode(",", $tags);

        return [
            "title" => $this->faker->sentence(),
            "subtitle" => $this->faker->sentence(18),
            "tags" => $tagsCsv,
            "content" => $this->faker->realText(150),
            "owner" => $this->faker->name(),
            "created_at" => date("d/m/Y H:i:s", time()),
            "updated_at" => date("d/m/Y H:i:s", time())
        ];
    }
}
