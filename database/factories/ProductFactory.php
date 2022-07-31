<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name'=>$this->faker->name(), 
            'price'=>rand(10000,100000),
            'image'=> $this->faker->image('public/image/product',640,480, null, false),
            'overview'=>$this->faker->text(100), 
            'description'=>$this->faker->text(200), 
            'quantity'=>rand(10,100),
            'status'=>rand(0,1), 
            'category_id'=>rand(18,43),
            'sale'=>0, 
            'discount'=>0
        ];
    }
}
