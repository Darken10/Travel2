<?php

namespace Database\Factories\Post;

use App\Models\Post\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $comments= Comment::all();
        return [
            'reponse' => fake()->paragraph,
            'user_id' => $users->random()->id,
            'comment_id' => $comments->random()->id,
        ];
    }
}
