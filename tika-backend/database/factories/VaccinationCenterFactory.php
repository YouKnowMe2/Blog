<?php

namespace Database\Factories;

use App\Models\Upazila;
use App\Models\VaccinationCenter;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccinationCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = VaccinationCenter::class;
    public function definition()
    {
        return [
            'name' => $this->faker->address,
            'upazila_id' => Upazila::all()->random()->id,
            'vaccine_id' => Vaccine::all()->random()->id,
            'available' => 200,
        ];
    }
}
