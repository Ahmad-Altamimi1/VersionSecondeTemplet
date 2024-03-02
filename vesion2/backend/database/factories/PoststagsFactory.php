<?php

namespace Database\Factories;

use App\Models\poststags;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoststagsFactory extends Factory
{
    protected $model = poststags::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'postId'=>$this->faker->numberBetween(1,1000),
            'tagId'=>$this->faker->numberBetween(1,12),

        ];
    }
}
