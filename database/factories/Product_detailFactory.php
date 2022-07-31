<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_detail>
 */
class Product_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function rands(){
    //     for ($i=38; $i <=106 ; $i++) { 
    //         return $i;
    //     }
    // }
    public function definition()
    {
        return [
            'product_id'=>mt_rand(38,106),
            'view'=>0,
            'price_sale'=>0,
            'size_id'=>"[]",
            'color_id'=>"[]"
        ];
    }
}
