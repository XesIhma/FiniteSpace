<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use File;
use App\Http\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   $images = File::allFiles(public_path().'\img\ships');
        $hp_max = $this->faker->numberBetween($min = 100, $max = 50000);
        $deuter_max = $this->faker->numberBetween($min = 1000.0, $max = 100000.0);
        $price = $this->faker->numberBetween($min = -100000, $max = 100000);
        if($price <= 0) $price = 0;
        return [
            'model' => $this->faker->randomElement(['Fighter', 'Interceptor', 'Deadly Fly', 'Oroborus', 'Nautilus']),
            'description' => "Opis statku",
            'class' => $this->faker->randomElement(['light fighter', 'heavy fighter', 'destroyer', 'transporter']),
            'size' => "20m 15m 10m",
            'image' => $this->faker->randomElement($images),
            'hp' => $this->faker->numberBetween($min = 0, $max = $hp_max),
            'hp_max' => $hp_max,
            'deuter' => $this->faker->numberBetween($min = 0.0, $max = $deuter_max),
            'deuter_max' => $deuter_max,
            'mass' => $this->faker->numberBetween($min = 1000, $max = 1000000),
            'weapon_slots' => $this->faker->numberBetween($min = 2, $max = 10),
            'engine_slots' => $this->faker->numberBetween($min = 1, $max = 5),
            'armor_slots' => $this->faker->numberBetween($min = 10, $max = 100),
            'price' => $price,
            'profile_id' => \App\Models\User::all()->random()->id
        ];
    }

    // $table->string('model');
    // $table->string('class');
    // $table->string('size');
    // $table->string('image');
    // $table->integer('hp');
    // $table->integer('hp_max');
    // $table->double('deuter', 10, 3);
    // $table->double('deuter_max', 10, 3);
    // $table->integer('mass');
    // $table->integer('weapon_slots');
    // $table->integer('engine_slots');
    // $table->integer('armor_slots');
    // $table->timestamp('created_at')->useCurrent();
    // $table->integer('price')->default('0');
    // $table->integer('last_price')->nullable();
    // $table->timestamp('bought_at')->nullable();
    // $table->foreignId('user_id')->constrained();
}
