<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Client;
use App\Content;
use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));
        

        /** Secciones de página */
        $sections = $page->sections;
        $section1s = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first(); // section2 == sección de card
        $filmStretch = Category::where('name', 'FILM STRETCH')->first();
        $products = null;
        if($filmStretch) {
            if(count($filmStretch->subCategories))
            $filmStretchSubCategoryID = $filmStretch->subCategories->pluck('id')->toArray();
            $products = Product::whereIn('sub_category_id', $filmStretchSubCategoryID)->first()->orderBy('order', 'ASC')->get();
        }
        $filmAlimentos = Category::where('name', 'FILM <br> DE ALIMENTOS')->first();
        $filmTermocontraible = Category::where('name', 'FILM <br> TERMOCONTRAIBLE')->first();
        return view('paginas.index', compact('section1s', 'section2', 'filmStretch', 'filmAlimentos', 'filmTermocontraible', 'products'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($this->data->description));
        

        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first(); // section2 == sección de ribbon
        $sliders = $company = null;
        if ($section1)  $sliders = $section1->contents()->orderBy('order', 'ASC')->get();
        if ($section2)  $company = $section2->contents()->first();
        
        return view('paginas.empresa', compact('sliders',  'company', 'page'));
    }

    public function filmStrech()
    {
        $filmStretch = Category::where('name', 'FILM STRETCH')->first();          
        $products = Product::where('sub_category_id', $filmStretch->subCategories()->first()->id)->orderBy('order', 'ASC')->get();

        SEO::setTitle(strip_tags($filmStretch->name));
        SEO::setDescription(strip_tags($filmStretch->content_1));

        return view('paginas.film-strech', compact('filmStretch', 'products'));
    }

    public function findFilmStrech($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        SEO::setTitle(strip_tags($subCategory->name));
        $subCategories = $subCategory->category->subCategories()->orderBy('order', 'ASC')->get();
        return view('paginas.find-film-strech', compact('subCategory', 'subCategories'));
    }

    public function productoFilmStrech($product)
    {
        $product = Product::findOrFail($product);
        $products = Product::where('sub_category_id', $product->subCategory->id)->orderBy('order', 'ASC')->get();
        SEO::setTitle(strip_tags($product->name));
        SEO::setDescription(strip_tags($product->description));
        $RPs = (count($products) > 3) ? $products->take(3) : $products;

        return view('paginas.producto-film-stretch', compact('product', 'products', 'RPs'));
    }

    public function filmAlimentos()
    {
        $category = Category::where('name', 'FILM <br> DE ALIMENTOS')->first();
        SEO::setTitle(strip_tags($category->name));
        SEO::setDescription(strip_tags($category->content_1));

        $products = SubCategory::where('name', 'Film Alimentos')->first()->products;        
        return view('paginas.film-alimentos', compact('category','products'));
    }
    

    public function productoFilmAlimentos($producto)
    {
        $product = Product::findOrFail($producto);
        SEO::setTitle(strip_tags($product->name));
        SEO::setDescription(strip_tags($product->description));

        $products = $product->subCategory->products()->orderBy('order', 'ASC')->get();
        $subCategory = SubCategory::where('name', 'Film Alimentos')->first();
        $rps = null;
        if($subCategory)
            $rps = (count($subCategory->products) > 3) ? $subCategory->products()->where('id', '<>', $product->id)->take(3)->get() : $subCategory->products()->where('id', '<>', $product->id)->get();
            
        return view('paginas.producto-film-alimentos', compact('product', 'products', 'rps'));
    }

    public function filmTermocontraible()
    {
        $filmTermocontraible = Category::where('name', 'FILM <br> TERMOCONTRAIBLE')->first();
        SEO::setTitle(strip_tags($filmTermocontraible->name));
        SEO::setDescription(strip_tags($filmTermocontraible->content_1));
        return view('paginas.film-termocontraible', compact('filmTermocontraible'));
    }

    public function calidad()
    {
        $page = Page::where('name', 'calidad')->first();

        SEO::setTitle('Calidad');
        SEO::setDescription(strip_tags($this->data->description));

        $section1  = $page->sections()->where('name', 'section_1')->first()->contents()->first();
        $section2s = $page->sections()->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.calidad', compact('section1', 'section2s'));
    }

    public function solicitarPresupuesto()
    {

        SEO::setTitle('Solicitar presupuesto');
        SEO::setDescription(strip_tags($this->data->description));

        return view('paginas.solicitar-presupuesto');
    }

    public function contacto()
    {
        SEO::setTitle('Contacto');
        SEO::setDescription(strip_tags($this->data->description)); 
        
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->data_sheet);  
    }

    public function fichaTecnicaCategoria($id)
    {
        $category = Category::findOrFail($id);  
        return Response::download($category->data_sheet);  
    }

    public function fichaTecnicaContent($id)
    {
        $content = Content::findOrFail($id);  
        return Response::download($content->image);  
    }

    public function fichaTecnicaPolitica($id, $campo)
    {
        $content = Content::findOrFail($id);  
        return Response::download($content->$campo);  
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->data_sheet))
            Storage::disk('public')->delete($product->data_sheet);

        $product->data_sheet = null;
        $product->save();

        return response()->json([], 200);
    }
}