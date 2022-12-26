<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function content()
    {
        return view('administrator.category.content');
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/categories','public');

        if($request->hasFile('data_sheet'))
            $data['data_sheet'] = $request->file('data_sheet')->store('images/data-sheet','public');
        

        $data['image_2'] = $request->file('image_2')->store('images/categories','public');

        Category::create($data);

        return back();
    }

    public function update(CategoryRequest $request)
    {
        $element = Category::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/categories','public');
        }      
        
        if($request->hasFile('image_2')){
            if(Storage::disk('public')->exists($element->image_2))
                Storage::disk('public')->delete($element->image_2);
            
            $data['image_2'] = $request->file('image_2')->store('images/categories','public');
        }  

        if($request->hasFile('data_sheet')){
            if(Storage::disk('public')->exists($element->data_sheet))
                Storage::disk('public')->delete($element->data_sheet);
            
            $data['data_sheet'] = $request->file('data_sheet')->store('images/data-sheet','public');
        }  


        $element->update($data);

        return back();
    }

    public function find($id)
    {
        return response()->json(['content' => Category::find($id)]);
    }

    public function destroy($id)
    {

        $element = Category::find($id);
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        if(Storage::disk('public')->exists($element->image_2))
            Storage::disk('public')->delete($element->image_2);
        
        $element->delete();

        return response()->json([], 200);
    }
    public function getList()
    {
        return DataTables::of(Category::query())
        ->editColumn('name', function($category){
            return $category->name;
        })
        ->editColumn('content_1', function($category){
            return $category->content_1;
        })
        ->editColumn('image', function($category){
            if (Storage::disk('public')->exists($category->image)) 
                return '<img src="'.asset($category->image).'" class="img-fluid" style="height: 50px; width: 100px; object-fit: cover;">';
        })
        ->editColumn('image_2', function($category){
            if (Storage::disk('public')->exists($category->image_2)) 
                return '<img src="'.asset($category->image_2).'" class="img-fluid" style="height: 50px; width: 100px; object-fit: cover;">';
        })
        ->addColumn('actions', function($category) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$category->id.')"></button>';
        })
        ->rawColumns(['actions', 'name', 'content_1', 'image', 'image_2'])
        ->make(true);
    }
}
