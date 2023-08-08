<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $en_name = $this->faker->unique()->words(4, true);
        $name = [
            'en' => $en_name,
            'ar' => $this->faker->words(4, true),
        ];

        $description = [
            'en' => $this->faker->sentences(4, true),
            'ar' => $this->faker->sentences(4, true),
        ];
        return [
            'name' => json_encode($name),
            'slug' => Str::slug($en_name),
            'icon' => 'fas fa-heart',
            'description' => json_encode($description),
            'parent_id' => null
        ];
    }
}
