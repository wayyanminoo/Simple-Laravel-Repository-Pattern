<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male','female']);

        return [
            'name' => $this->faker->name($gender),
            'gender' => $gender,
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'dob' => $this->faker->date(
                $format = 'Y-m-d',$max = 'now'
            )
        ];
    }
}
