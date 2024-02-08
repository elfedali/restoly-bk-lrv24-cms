<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Node;
use App\Models\User;

class NodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Node::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'owner_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'excerpt' => $this->faker->paragraph(),
            //'slug' => $this->faker->slug(),
            'status' => $this->faker->randomElement(['published', 'draft', 'private']),
            'type' => $this->faker->randomElement(['post', 'page']),
            'comment_status' => $this->faker->randomElement(['open', 'closed']),
        ];
    }
}
