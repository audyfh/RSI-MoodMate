<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\EmotionTrack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmotionTrack>
 */
class EmotionTrackFactory extends Factory
{
    protected $model = EmotionTrack::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'emotion' => $this->faker->randomElement(['happy', 'neutral', 'sad']),
            'user_id' => User::factory()
        ];
    }
}
