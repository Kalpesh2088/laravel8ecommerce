<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Category_name =$this->faker->unique()->words($nb=2,$asText=true);
        $slug =Str::slug($Category_name);
        return [
            'name' => $Category_name,
            'slug' => $slug
        ];
    }
}
