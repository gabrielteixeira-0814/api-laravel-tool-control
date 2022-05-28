<?php

namespace Database\Factories;

use App\Models\Turn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turn>
 */
class TurnFactory extends Factory
{
    protected $model = Turn::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'turn' => $this->faker->name(),
            'codeTurn' => $this->faker->name(),
            'status' => $this->faker->boolean()
        ];
    }
}
