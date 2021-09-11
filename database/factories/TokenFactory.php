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
        $plain = hash_pbkdf2('ripemd320', $this->faker->word(),  $this->faker->sha256(),'1000', '50', 'true');
        return [
            'plain' => $plain,
            // Hash the token for safe transit to the client device
            'hash' => hash_pbkdf2('ripemd320', $plain, $this->faker->sha256(),'1000', '50', false),
            'type' => function () {
                if(rand(0, 1)) {
                        return 'initial';
                }
                return 'user';
            }
        ];
    }
}
