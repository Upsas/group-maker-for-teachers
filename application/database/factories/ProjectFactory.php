<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'groups' => $this->faker->numberBetween(3, 8),
            'students_per_group' => $this->faker->numberBetween(2, 5),
            'teacher_id' => $this->faker->unique(true)->numberBetween(5, UserFactory::USER_COUNT)];
    }
}
