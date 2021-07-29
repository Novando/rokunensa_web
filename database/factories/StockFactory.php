<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

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
            'size' => $this->faker->randomElement(['XXL', 'XL', 'L', 'M', 'S']),
            'sold' => $this->faker->numberBetween(0, 12)
        ];
    }
}
