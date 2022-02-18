<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip' => $this->faker->ipv4(),
            'date' => $this->faker->date('2022-m-d'),
            'datetime' => $this->faker->dateTimeThisYear(),
            'URL' => $this->faker->url(),
            'useragent' => $this->faker->text(200),
            'os' => $this->faker->randomElement(['Windows', 'Mac os', 'Linux', 'Android']),
            'architec' => $this->faker->randomElement(['x64', 'x86', 'x32', 'mac os', 'mobile']),
            'browser' => $this->faker->randomElement(['Chrome', 'FireFox', 'Edge', 'Opera', 'Safari', 'YaBrowser']),
        ];
    }
}
