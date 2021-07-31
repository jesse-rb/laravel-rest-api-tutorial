<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(2),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 0, 999),
            'seller_id' => \App\Models\Seller::factory()

        ];
    }
}
