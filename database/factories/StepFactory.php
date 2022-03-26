<?php

namespace Database\Factories;

use App\Models\Step;
use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    protected $model = Step::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(15),
            'checked' => random_int(0, 1)
        ];
    }
}
