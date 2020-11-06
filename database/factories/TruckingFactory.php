<?php

namespace Database\Factories;

use App\Models\Trucking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TruckingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trucking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(['1', '2', '3', '4']),
            'company' => $this->faker->randomElement(['AIS', 'CRC']),
            'trucking_date_requested' => $this->faker->dateTimeThisMonth,
            'requested_by' => $this->faker->randomElement(['Mike Schuyler', 'Adam Harding', 'Matt Rinckey']),
            'bill_to' => $this->faker->randomElement(['AIS', 'CRC']),
            'type' => $this->faker->randomElement(['Branch Transfer', 'Customer Move', 'Demo', 'Rental']),
            'requested_email' => $this->faker->randomElement(['mike@crc.com', 'adam@crc.com', 'matt@crc.com']),
            'po' => $this->faker->numerify('######'),
            'notify' => '0',
            'backhaul' => '0',
            'from_location' => $this->faker->company,
            'from_name' => $this->faker->company,
            'from_address' => $this->faker->address,
            'from_city' => $this->faker->city,
            'from_state' => $this->faker->state,
            'from_contact' => $this->faker->name,
            'from_phone' => $this->faker->phoneNumber,
            'to_location' => $this->faker->company,
            'to_name' => $this->faker->company,
            'to_address' => $this->faker->address,
            'to_city' => $this->faker->city,
            'to_state' => $this->faker->state,
            'to_contact' => $this->faker->name,
            'to_phone' => $this->faker->phoneNumber,
            'manufacturer' => $this->faker->randomElement(['Deere', 'Komatsu', 'JCB']),
            'model' => $this->faker->randomElement(['210G', 'PC360', '512']),
            'sn' => $this->faker->numerify('######'),
            'stock' => $this->faker->numerify('######'),
            'attachment' => $this->faker->numerify('####'),
            'status' => $this->faker->randomElement(['New', 'Unscheduled', 'Scheduled', 'Enroute', 'Delivered', 'Complete']),
            'truck' => $this->faker->randomElement(['Kevin Mack', 'Keith Cordner', 'Bethany Czerwinski']),
            'order' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'sorting' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e', 'f']),
            'billed' => $this->faker->randomElement(['Yes', 'No', 'Ready']),
            'active' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
