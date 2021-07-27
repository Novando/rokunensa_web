<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4, $asText=true);
        $sku = 'TEST' . $this->faker->unique()->numberBetween(100, 500);
        $slug = Str::slug($sku . $product_name);
        return [
            'name' => $product_name,
            'link' => $slug,
            'SKU' => $sku,
            'desc' => $this->faker->text(500),
            'prod_cost' => $this->faker->numberBetween(5, 50),
            'base_price' => $this->faker->numberBetween(5, 50),
            'sale_price' => $this->faker->numberBetween(5, 50),
            'image' => 'product-' . $this->faker->numberBetween(1, 12) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
