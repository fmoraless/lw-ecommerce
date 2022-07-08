<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $description = $this->faker->text;
        $price = $this->faker->randomFloat(2, 0, 100);
        $status = $this->faker->randomElement([Product::BORRADOR, Product::PUBLIDADO]);
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;
        $brand = $category->brands->random();
        if ($subcategory->color) {
            $quantity = null;
        }else {
            $quantity = 15;
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $description,
            'price' => $price,
            'subcategory_id' => $subcategory,
            'brand_id' => $brand->id,
            'quantity' => $quantity,
            'status' => $status,

        ];
    }
}
