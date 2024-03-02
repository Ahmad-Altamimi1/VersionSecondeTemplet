<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'TITLE' => $this->faker->word,
            'Main_IMG' => 'uploads/1706783831.jpg',
            'WRITER' => 1,
            'DESCRIPTION' => $this->faker->sentence,
            'TEXT1' => $this->faker->sentence,
            'PIC_Name' => $this->faker->word,
            'REFERENCES' => $this->faker->word,
            'groupId'=>1,
            'tagId'=>$this->faker->numberBetween(1,12),
            'EDITOR'=>1,
            'REED'=>0,
           
            
        ];
    }
}
