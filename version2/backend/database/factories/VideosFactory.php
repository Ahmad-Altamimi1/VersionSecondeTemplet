<?php

namespace Database\Factories;

use App\Models\Videos;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideosFactory extends Factory
{
    protected $model = Videos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'TITLE' => $this->faker->word,
            'IMG' => 'uploads/1706783831.jpg',
            'WRITER' => 1,
            'DESCRIPTION' => $this->faker->sentence,
            'TEXT1' => $this->faker->sentence,
            'TEXT2' => $this->faker->sentence,
            'TEXT3' => $this->faker->sentence,
            'groupId' => 1,
            'VID' => "https://www.youtube.com/embed/Yxkbg-mgTWI?si=QV63Td6ZEuPeNktR",
            'tagId' => $this->faker->numberBetween(1, 12),
            'EDITOR' => 1,
            'REED' => 0,
            'DRAFT' => 0,
            'URGENT' => 0,
        ];
    }

    /**
     * Generate a random YouTube video ID.
     *
     * @return string
     */
    private function generateYouTubeVideoId()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_';
        $videoId = '';

        for ($i = 0; $i < 11; $i++) {
            $videoId .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $videoId;
    }
}
