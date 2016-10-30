<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Manuel Tejero',
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123')
        ]);

        User::create([
            'name' => 'Juan Ramos',
            'email' => 'juancagb.17@hotmail.com',
            'password' => bcrypt('123123'),
            'provider' => true,
            'service_type_id' => 3,
            'address' => 'Cerca al colegio Antenor Orrego',
            'region' => 'La Libertad / Trujillo',
            'district' => 'Laredo',

            'contract_name' => 'Juan',
            'contract_email' => 'juan@gmail.com',
            'contract_cellphone' => '555 444 333',
            'contract_phone' => '22 44 66',

            'payment_name' => 'Carlos',
            'payment_email' => 'carlos@gmail.com',
            'payment_cellphone' => '666 555 333',
            'payment_phone' => '21 00 88',

            'professional_profile' => 'Soy una persona que siempre está aprendiendo cómo funcionan las nuevas tecnologías.',
            'professional_experience' => 'He participado en proyectos de desarrollo web y móvil.',
            'professional_education' => 'Ingeniero de sistemas egresado de la Universidad Nacional de Trujillo.',
            'professional_specialty' => 'He usado variados lenguajes de programación, siendo los principales PHP para el desarrollo backend, y Android para el desarrollo móvil.'
        ]);
    }
}
