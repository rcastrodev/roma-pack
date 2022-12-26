<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create(['name' => 'FILM TERMOCONTRAIBLE']);

        Category::create([
            'image'     => 'images/categories/Componente31-1.png',
            'image_2'   => 'images/categories/Componente31-1.png',
            'name'      => 'FILM <br> DE ALIMENTOS',
            'content_1' =>'<p>El film para alimentos "Roma Pack" esta realizado con 100% en polietileno, esto le da la característica de "no tóxico" ya que no transfiere aditivos perjudiciales para la salud, de este modo nos posicionamos con estándares de calidad por encima del mercado interno. Mantiene la humedad de los alimentos, se adapta a todo tipo de recipientes y es apto para heladera, freezer y microondas.</p>'
        ]);

        Category::create([
            'image'     => 'images/categories/Componente32–1.png',
            'image_2'   => 'images/categories/Componente31-1.png',
            'name'      => 'FILM <br> TERMOCONTRAIBLE',
            'content_1' => '<p>El film de polietileno "Roma Pack", es un material tricapa y cristal, cuya capacidad de contracción permite consolidar desde pequeños volúmenes hasta cargas palletizadas.</p>
            <p>Se presenta en forma de lámina, tubo cerrado o abierto, en medidas, espesor y grado de consolidación adaptables a la necesidad del usuario.</p>',
            'data_sheet'=> 'images/data-sheet/3F5ybcFy2M0WYCFwBnXEXWYkEfnsR5Tz0ejAKe8Q.png'    
        ]);
    }
}
 

