<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Licencia;

class LicenciaSeeder extends Seeder
{
    public function run(): void
    {

        $tipos = ['A', 'B', 'C', 'D'];

        $sangres = [
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-'
        ];

        for($i = 1; $i <= 100; $i++){

            Licencia::create([

             'nombre' => fake()->firstName(),

             'apellido_paterno' => fake()->lastName(),

             'apellido_materno' => fake()->lastName(),

             'edad' => rand(18,70),

              'telefono' => fake()->phoneNumber(),

             'direccion' => fake()->address(),

              'tipo_licencia' => $tipos[array_rand($tipos)],

             'tipo_sangre' => $sangres[array_rand($sangres)],

             'fecha_expedicion' => now(),

             'fecha_vencimiento' => now()->addYears(3),

             'foto' => 'default.png'

            ]);

        }

    }
}