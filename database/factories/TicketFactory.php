<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        return [
            'task' => $this->faker->sentence(),
            'tasklong' => $this->faker->sentence(30),
            'archived' => random_int(0, 1),
            'creationdate' => $this->faker->dateTime(),
            'author' => $this->faker->name(),
            'room' => $this->faker->randomNumber(4, true),
            'duedate' => $this->faker->dateTime()
        ];
    }
}
