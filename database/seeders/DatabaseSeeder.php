<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        User::factory(3)->create();
        Posts::factory(5)->create();

        /* Posts::create([
            "title" => "A wonderful day in Paris",
            "subtitle" => "Following along my expedition path",
            "tags" => "Travel, Travelling, Europe, Expedition, Gastronomy",
            "content" => "One day I woke up and found a cute mice near my window. So small and freightned, I smoothly opened it to leave my room. Could be him be Ratatouille?",
            "owner" => "Angela Dwarf",
            "created_at" => date("d/m/Y H:i:s", time()),
            "updated_at" => date("d/m/Y H:i:s", time())
        ]);

        Posts::create([
            "title" => "Could you be the next World Changer?",
            "subtitle" => "A statistical research into probability and impactful people in humanity history",
            "tags" => "Mathematics, Statistics, Probability",
            "content" => "blah blah blahs",
            "owner" => "Andrew Milton Garfield",
            "created_at" => date("d/m/Y H:i:s", time()),
            "updated_at" => date("d/m/Y H:i:s", time())
        ]); */
    }
}
