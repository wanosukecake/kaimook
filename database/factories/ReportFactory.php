<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random_date = $this->faker->dateTimeBetween('-1year', '-1day');
 
        return [
            'title' => $this->faker->realText(rand(20,50)),
            'body' => $this->faker->realText(rand(100,200)),
            'user_id' => $this->faker->numberBetween(1,2),
            'hour' => $this->faker->numberBetween(1,12),
            'minutes' => $this->faker->numberBetween(0,60),
            'created_at' => $random_date,
            'updated_at' => $random_date
        ];
    }
}
