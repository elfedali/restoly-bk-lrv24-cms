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
            'name' => $this->faker->name(),
            'body' => $this->faker->word(),
            'excerpt' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->word(),
            'type' => $this->faker->word(),
            'comment_status' => $this->faker->word(),
        ];
    }
}
