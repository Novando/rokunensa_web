<?php

namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sku = 'TEST' . $this->faker->numberBetween(1, 20);
        return [
            'SKU' => $sku,
            'reviewer' => $this->faker->randomElement(['tempora', 'molestias', 'et', 'in', 'magni']),
            'review' => $this->faker->unique()->words($nb=20, $asText=true),
            'score' => $this->faker->numberBetween(1, 5)
        ];
    }
}
