<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
 
     
    public function definition()
    {
      
        return [
            'nama_mhs' => $this->faker->name(),
            'nim' => $this->faker->randomNumber(9, true),
            'prodi' => $this->faker->jobTitle(),
            'image' => 'https://source.unsplash.com/random',
        ];
    }
    


    
}
