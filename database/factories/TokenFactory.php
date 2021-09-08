<?php

namespace Database\Factories;

use App\Models\Token;
use Illuminate\Database\Eloquent\Factories\Factory;

class TokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Token::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plain' => hash_pbkdf2('ripemd320', $this->faker->word(), '18843f5315274a3486770ee56a82d6ae21b','1000', '50', 'true'),
            // Hash the token for safe transit to the client device
            'hash' => '' #hash_pbkdf2()
        ];
    }
}
