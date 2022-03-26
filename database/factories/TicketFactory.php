<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(15),
            'steps' => Step::factory()->make(rand(0, 6)),
            'done' => random_int(0, 1),
            'archived' => random_int(0, 1),
            'creationDate' => $this->faker->dateTime(),
            'author' => $this->faker->name(),
            'room' => $this->faker->randomNumber(4, true),
            'dueDate' => $this->faker->dateTime()

        ];
    }
}
