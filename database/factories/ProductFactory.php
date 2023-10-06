<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\User;
use App\Models\VatRate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'sub_category_id' => $this->faker->randomElement(SubCategory::pluck('id')->toArray()),

            'unit_id' => $this->faker->randomElement(Unit::pluck('id')->toArray()),


            'name' => $this->faker->name(),
            'item_code' => $this->faker->unique()->randomNumber,
            'regular_price' => $this->faker->numberBetween(800, 3000),
            'selling_price' => $this->faker->numberBetween(800, 3000),

            'vat_rate' => $this->faker->numberBetween(1, 5),

            'alert_quantity' => $this->faker->numberBetween(1, 5),
            'image' => "upload/product/" . $this->faker->numberBetween(1, 21) . ".jpg",
            'discount' => $this->faker->numberBetween(1, 99),
            'status' => $this->faker->randomElement(['active', 'inactive']),

            'created_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'updated_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
