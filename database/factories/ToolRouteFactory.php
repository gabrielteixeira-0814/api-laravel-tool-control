<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tool;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToolRoute>
 */
class ToolRouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'operationType' => $this->faker->name(),
            'finalResult' => $this->faker->text(100),
            'user_id' => User::factory(),
            'tool_id' => Tool::factory(),
            'status' => $this->faker->boolean()
        ];
    }
}
