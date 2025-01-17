<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            // ... autres champs
            'new_prop1' => fake()->word(),
            'new_prop2' => fake()->paragraph()
        ];
    }
}