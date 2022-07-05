<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mark;
use App\Models\Models;
use App\Models\Statustool;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'codeTool' => $this->faker->text(10),
            'image' => $this->faker->name(10),
            'mark_id' => Mark::factory(),
            'model_id' => Models::factory(),
            'statustool_id' => Statustool::factory(),
            'status' => $this->faker->boolean()
        ];
    }
}
