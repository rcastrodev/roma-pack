<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function content()
    {
        $categories = Category::all();
        return view('administrator.sub-category.content', compact('categories'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/sub-category','public');
        
        SubCategory::create($data);
    }

    public function update(Request $request)
    {
        $element = SubCategory::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/sub-category','public');
        }      
        
        $element->update($data);
    }

    public function find($id)
    {
        return response()->json(['content' => SubCategory::find($id)]);
    }

    public function destroy($id)
    {

        $element = SubCategory::find($id);
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);
        
        $element->delete();

        return response()->json([], 200);
    }
    public function getList()
    {
        $build = SubCategory::orderBy('order', 'ASC');
        return DataTables::of($build)
        ->editColumn('name', function($subCategory){
            return $subCategory->name;
        })
        ->editColumn('category', function($subCategory){
            return $subCategory->category->name;
        })
        ->editColumn('image', function($subCategory){
            if (Storage::disk('public')->exists($subCategory->image)) 
                return '<img src="'.asset($subCategory->image).'" class="img-fluid" style="height: 50px; width: 100px; object-fit: cover;">';
        })
        ->addColumn('actions', function($subCategory) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$subCategory->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$subCategory->id.')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'name', 'category', 'image'])
        ->make(true);
    }
}
