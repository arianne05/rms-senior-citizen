<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeniorCitizen>
 */
class SeniorCitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'middlename' => null,
            'lastname' => fake()->lastName(),
            'suffix' => null,
            'sex' => fake()->randomElement(['Male','Female']),
            'birthdate' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'civil_status' => fake()->randomElement(['Single','Married','Widow','Separated']),
            'religion' => fake()->randomElement(['Roman Catholic','Muslim','Iglesia','Christian']),
            'birthplace' => fake()->city(),
            'gsis' => null,
            'philhealth' => null,
            'tin' => null,
            'sss' => null,
            'contact' => null,
            'beneficiary' => null,
            'contact_beneficiary' => null,
            'status_membership' => fake()->randomElement(['PWD','Pensionary','Non-Pensionary']),
            'house_number' => fake()->streetAddress(),
            'barangay' => fake()->streetName(),
            'municipality' => fake()->city(),
            'province' => fake()->country(),
            'zipcode' => fake()->postcode(),
        ];
    }
}
