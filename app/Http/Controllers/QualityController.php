<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class QualityController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'calidad')->first();
    }

    public function content()
    {
        $page = $this->page;
        $sections   = $page->sections;
        $section_1   = $sections->where('name', 'section_1')->first()->contents()->first();
        $section_2   = $sections->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.quality.content', compact('section_1', 'section_2'));
    }
    
    public function storeSlider(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/quality','public');
        Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function updateSlider(Request $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','public');
        } 
        $element->update($data);
    }


    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','public');
        } 

        if($request->hasFile('content_4')){
            if(Storage::disk('public')->exists($element->content_4))
                Storage::disk('public')->delete($element->content_4);
            
            $data['content_4'] = $request->file('content_4')->store('images/quality','public');
        } 

        if($request->hasFile('content_5')){
            if(Storage::disk('public')->exists($element->content_5))
                Storage::disk('public')->delete($element->content_5);
            
            $data['content_5'] = $request->file('content_5')->store('images/quality','public');
        } 

        $element->update($data);
        
        return back();
    }


    public function destroyHomeGenericSection($id)
    {
        $element = Content::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);
        
        $element->delete();

        return response()->json([], 200);
    }

    public function politicDestroy($column, $id)
    {
        $element = Content::find($id);

        if(Storage::disk('public')->exists($element->$column))
            Storage::disk('public')->delete($element->$column);

        $element->$column = null;
        $element->save();

        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        $sectionSlider = $this->page->sections()->where('name', 'section_2')->first();
        $images = $sectionSlider->contents()->orderBy('order', 'ASC');

        return DataTables::of($images)
        ->editColumn('image', function($image){
            return '<img src="'.asset($image->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($image) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$image->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$image->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
