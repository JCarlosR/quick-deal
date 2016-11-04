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
            'name' => 'Administrador',
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123')
        ]);

        User::create([
            'name' => 'Juan Ramos',
            'email' => 'juancagb.17@hotmail.com',
            'password' => bcrypt('123123'),
            'provider' => true,
            'service_type_id' => 1,
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

        User::create([
            'name' => 'Tejero Alcalde Manuel Alejandro',
            'email' => 'tejerom@hotmail.com',
            'password' => bcrypt('123123'),
            'provider' => true,
            'service_type_id' => 1,
            'address' => 'Calle Roma 335',
            'region' => 'Lima',
            'district' => 'San Isidro',

            'contract_name' => 'Manuel Tejero',
            'contract_email' => 'juan@gmail.com',
            'contract_cellphone' => '942761597',
            'contract_phone' => '4221833',

            'payment_name' => 'Manuel Tejero',
            'payment_email' => 'carlos@gmail.com',
            'payment_cellphone' => '942761597',
            'payment_phone' => '4221833',

            'professional_profile' => 'Es un muchacho emprendedor, entusiasta en el desempeño de sus labores, pro-activo, adaptable a los cambios, gran sentido analítico, objetivo, manejo de situaciones difíciles y que demandan creatividad en buscar soluciones, sociable y comunicativo.',
            'professional_experience' => 'Duración: 01/01/2016 al 31/10/2016; Insititución: Independiente; Profesión: Mozo                   Principales funciones: Cumplir con el requerimiento del cliente, servir bebidas alcohólicas y no alcohólicas. Preparar bebidas como Cuba Libre, Whisky, chilcanos, etc.',
            'professional_education' => 'Primaria y secundaria en el colegio de la inmaculada. Desde el año 1996 al 2006.',
            'professional_specialty' => 'Conocimiento en preparación de bebidas alcohólicas con diseño y arte.',

            'psychologist_comments' => 'Es una persona responsable, proactiva y puntual. Es apto para el puesto de mozo.'
        ]);
    }
}
