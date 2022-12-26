<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $subCategories = SubCategory::all();
        return view('administrator.product.create', compact('subCategories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('data_sheet')) 
            $data['data_sheet'] = $request->file('data_sheet')->store('images/data-sheet', 'public');

        $product = Product::create($data);
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'public')
                ]);
            }
        }

        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $product = Product::findOrFail($id);
        $subCategories = SubCategory::all();
        $numberOfImagesAllowed = 3 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'subCategories', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {        
        $data = $request->all();
        $product = Product::find($request->input('id'));

        if($request->hasFile('data_sheet')){
            if (Storage::disk('public')->exists($product->data_sheet))
                    Storage::disk('public')->delete($product->data_sheet);
            
            $data['data_sheet'] = $request->file('data_sheet')->store('images/data-sheet', 'public');
        }

        $product->update($data);
        $applications = $product->applications;
        
            
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'public')
                ]);
            }
        }
                        
        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getColor($id)
    {
        $product = Product::find($id);

        return response()->json([
            'colors' => $product->colors
        ]);

    }

    public function getList()
    {
        $products = Product::orderBy('order', 'ASC');

        return DataTables::of($products)
        ->addColumn('image', function($product) {
            if (count($product->images)) {
                if (Storage::disk('public')->exists($product->images()->first()->image)) 
                return '<img src="'.asset($product->images()->first()->image).'" alt="" width="150">';
            }
        })
        ->addColumn('subCategory', function($product) {
            return $product->subCategory->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
