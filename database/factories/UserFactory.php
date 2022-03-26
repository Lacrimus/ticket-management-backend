<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->lastName();
        return [
            'name' => $name,
            'mail' => $this->faker->unique()->safeEmail(),
            // The hash alogithm used is ripemd320
            'token' => hash_pbkdf2('ripemd320', $this->faker->word(), $this->faker->sha256(),'1000', '50', false),
            'color' => $this->faker->hexColor(),
            'markedTickets' => '',
        ];
        //Todo: unify token generation (user receives tokens from token table after redeeming intial token)
    }

    /**
     * The user's state before the initial token has been sent to claim the user token.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function initial()
    {
        return $this->state(function (array $attributes) {
            return [
                'token' => null,
            ];
        });
    }
}
