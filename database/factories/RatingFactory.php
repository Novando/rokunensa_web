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
        $sku = $this->faker->numberBetween(1, 20);
        return [
            'product_id' => $sku,
            'user_id' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->unique()->words($nb=20, $asText=true),
            'score' => $this->faker->numberBetween(1, 5)
        ];
    }
}
