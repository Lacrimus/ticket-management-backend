<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->lastName();
        $short = preg_replace('#[aeiou\s]+#i', '', $name);
        return [
            'name' => $name,
            'short' => $short,
            'email' => $this->faker->unique()->safeEmail(),
            // The hash alogithm used is ripemd320
            'token' => hash_pbkdf2('ripemd320', $this->faker->word(), $this->faker->sha256(),'1000', '50', false),
            'color' => $this->faker->hexColor(),
            'staredtickets' => '', //array_fill(0, random_int(1, 5), $this->faker->sha256()),
            'remember_token' => ''
        ];
        //Todo: unify token generation (user receives tokens from token table)
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}