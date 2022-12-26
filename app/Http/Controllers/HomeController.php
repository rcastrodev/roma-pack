<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HomeStoreSliderRequest;
use App\Http\Requests\HomeSliderUpdateRequest;
use App\Http\Requests\UpdateHomeGenericSectionRequest;

class HomeController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'home')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $sections   = $this->page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.home.content', compact('section1', 'section2'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function storeHomeGenericSection(HomeStoreSliderRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/home', 'public');
        
        $content = Content::create($data);
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/home', 'public');
        $content = Content::create($data);
        
        return back();
    }

    public function updateHomeGenericSection(Request $request)
    {
        
        $element = Content::find($request->input('id'));
        $data = $request->all();

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','public');
        } 
        
        if($request->hasFile('content_1')){
            if(Storage::disk('public')->exists($element->content_1))
                Storage::disk('public')->delete($element->content_1);
            
            $data['content_1'] = $request->file('content_1')->store('images/home','public');
        } 

        if($request->hasFile('content_2')){
            if(Storage::disk('public')->exists($element->content_2))
                Storage::disk('public')->delete($element->content_2);
            
            $data['content_2'] = $request->file('content_2')->store('images/home','public');
        } 

        if($request->hasFile('content_3')){
            if(Storage::disk('public')->exists($element->content_3))
                Storage::disk('public')->delete($element->content_3);
            
            $data['content_3'] = $request->file('content_3')->store('images/home','public');
        } 

        $element->update($data);
        return back();
    }

    public function update(Request $request)
    {

        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','public');
        } 
  
        $element->update($data);

        return back();
    }

    public function destroyHomeGenericSection($id)
    {
        $element = Content::find($id);
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        if(Storage::disk('public')->exists($element->content_1))
            Storage::disk('public')->delete($element->content_1);

        if(Storage::disk('public')->exists($element->content_2))
            Storage::disk('public')->delete($element->content_2);

        if(Storage::disk('public')->exists($element->content_3))
            Storage::disk('public')->delete($element->content_3);

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()
            ->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            if (Storage::disk('public')->exists($slider->image)) 
                return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($slider){
            return $slider->content_2;
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}



