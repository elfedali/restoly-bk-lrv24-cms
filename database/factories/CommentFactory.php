<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Node;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'node_id' => Node::factory(),
            'author_id' => User::factory(),
            'parent_id' => $this->faker->numberBetween(-10000, 10000),
            'comment' => $this->faker->word(),
            'status' => $this->faker->word(),
            'comment_date' => $this->faker->dateTime(),
            'rating' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
