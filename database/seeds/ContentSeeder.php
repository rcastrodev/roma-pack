<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 1,
                'image'     => 'images/home/Componente30–1.png',
                'content_1' => 'PRACTIC FILM',
                'content_2' => '<p>Europackaging presenta una alternativa novedosa y conveniente al film stretch estándar: Practic Film, un film multicapas ultra fino que permite reducir significativamente los costos anuales del producto</p><ul><li>Reduce su costo anual de envoltura de pallet</li><li>Protege del medioambiente</li></ul>'
            ]);
        }

        Content::create([
            'section_id'=> 2,
            'image'     => 'images/home/Componente36–1.png',
            'content_1' => 'images/home/Componente33-1.png',
            'content_2' => 'images/home/Componente34–1.png',
            'content_3' => 'images/home/Componente35–1.png',
        ]);

        Content::create([
            'section_id'=> 3,
            'image'     => 'images/company/Componente43–1.png',
        ]);

        Content::create([
            'section_id'=> 4,
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Roma Pack S.A.,es una empresa en constante desarrollo. Fabrica y distribuye Film Stretch y Film Termocontraible.</p>
            <p>Son utilizados en la industria, transporte y comercio, para el cuidado de productos desde el momento de la recepción, palletización, distribución y entrega de los mismos.</p>
            <p>Nuestra prioridad es su satisfacción. Es por eso, que nuestro personal está formado por un equipo de expertos preparados para asesorarle de forma individual y personalizada, en todas las áreas requeridas, para llevar a buen término las diferentes negociaciones que lleva a cabo su empresa.</p>',
            'image'     => 'images/company/Componente43–1.png',
        ]);


        Content::create([
            'section_id'=> 5,
            'content_1' => 'POLÍTICAS DE CALIDAD',
            'content_2' => '<p>En ROMAPACK tenemos el objetivo permanente de asegurar la calidad en nuestros productos y servicios, junto a la participación de todos los integrantes de la organización.</p>
            <p>Para lograrlo, asumimos el compromiso de cumplir con los requisitos acordados de nuestros clientes y con los de la Norma ISO 9001:2015.</p>
            <p>Nuestro trabajo continuo sobre el sistema de gestión, la capacitación permanente de todos los integrantes de la empresa y una constante actualización tecnológica, nos posiciona como una de las empresas líderes en el sector desde su fundación.</p>',
            'content_3' => 'Política de Calidad ROMAPACK',
            'image'     => 'images/company/Componente43–1.png',
            
        ]);

        Content::create([
            'section_id'=> 6,
            'image'     => 'images/quality/Componente62–1.png',
        ]);
        
        Content::create([
            'section_id'=> 6,
            'image' => 'images/quality/Componente62–1.png',
        ]);

        Content::create([
            'section_id'=> 6,
            'image' => 'images/quality/Componente63–1.png',
        ]);

    }
}