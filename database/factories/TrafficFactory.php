<?php

namespace Database\Factories;

use App\Models\Traffic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Traffic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit,
            'created_at' => $this->faker->time('now'),
            'salesman' => $this->faker->randomElement(['Adam Harding', 'Matt Rinckey', 'Mike Schuyler']),
            'branch' => $this->faker->randomElement(['Detroit', 'Grand Rapids', 'Lansing', 'Richmond', 'Saginaw', 'Traverse City']),
            'rerent' => $this->faker->randomElement(['Yes', 'No']),
            'io' => $this->faker->randomElement(['In', 'Out']),
            'make' => $this->faker->randomElement(['Deere', 'Komatsu', 'JCB', 'Atlas Copco']),
            'model' => $this->faker->colorName,
            'sn' => $this->faker->numerify('######'),
            'hours' => $this->faker->numerify('####'),
            'attachments' => $this->faker->numerify('####'),
            'damages' => $this->faker->randomElement(['Yes', 'No']),
            'customer' => $this->faker->randomElement(['MJ Electric', 'Barton Malow', 'United Piping', 'Michels']),
            'comments' => $this->faker->randomElement(['Ready', 'Not Ready']),
        ];
    }
}
