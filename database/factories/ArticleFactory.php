<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $content = fake()->text();
        return [
            'title' => fake()->name(),
            'content_full' => $content,
            'content_short' => substr($content,0,20),
            'is_active' => true
        ];
    }

}
