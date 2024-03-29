<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Term;

class TermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Term::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $terms = [
            'category',
            'tag',
        ];

        return [
            'name' => ucfirst($this->faker->word()),
            // 'slug' => $this->faker->slug(),
            'taxonomy' => $this->faker->randomElement($terms),
        ];
    }
}
