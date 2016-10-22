<?php

use App\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceType::create([
            'name' => 'Mozo'
        ]);

        ServiceType::create([
            'name' => 'Gasfitería'
        ]);

        ServiceType::create([
            'name' => 'Reparación de electrodomésticos y equipos'
        ]);

        ServiceType::create([
            'name' => 'Jardinería'
        ]);
    }
}
