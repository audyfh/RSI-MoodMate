<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HappyQuest>
 */
class HappyQuestFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), 
            'description' => $this->faker->paragraph(), 
            'is_active' => $this->faker->boolean(90), 
        ];
    }
}
