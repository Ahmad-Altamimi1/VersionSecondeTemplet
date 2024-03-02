<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'TITLE' => $this->faker->word,
            'IMG' => 'https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'WRITER' => 1,
            'parentId' => Null,
            'DESCRIPTION' => $this->faker->sentence,
            'TEXT' => $this->faker->sentence,
            'EDITOR'=>1,
            'REED'=>0,
        ];
    }
}
