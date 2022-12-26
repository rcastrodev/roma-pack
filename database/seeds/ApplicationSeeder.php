<?php

use App\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create([
            'order'=> 'AA',
            'name' => 'Para tu hogar',
            'icon'=> 'fas fa-home'
        ]);

        Application::create([
            'order'=> 'BB',
            'name' => 'Para tu comercio',
            'icon'=> 'fas fa-warehouse'
        ]);

        Application::create([
            'order'=> 'CC',
            'name' => 'Para tu industria',
            'icon'  => 'fas fa-industry'
        ]);
    }
}
