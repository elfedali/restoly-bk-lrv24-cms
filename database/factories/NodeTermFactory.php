<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\NodeTerm;

class NodeTermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NodeTerm::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'node_id' => $this->faker->numberBetween(-10000, 10000),
            'term_id' => $this->faker->numberBetween(-10000, 10000),
            'weight' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
