<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::first()->id;

        Data::create([
            'company_id'=> $company_id,
            'address'   => 'Av. Juan M. de Rosas 7020 (Ruta Nac. Nº3) Isidro Casanova. Buenos Aires. Argentina',
            'email'     => 'info@romapack.com.ar',
            'phone1'    => '46947400|4694-7400',
            'phone2'    => '46947400|4694-7400',
            'facebook' => '#',
            'instagram' => '#',
            'linkedin'  => '#',
            'logo'=> 'images/data/logo.png',
        ]);
    }
}
