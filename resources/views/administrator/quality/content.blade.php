@extends('adminlte::page')
@section('title', 'calidad')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Calidad</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<form action="{{ route('quality.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-asyn="no" enctype="multipart/form-data">
    @csrf
    <h4 class="col-sm-12 mb-4">Contenido de empresa</h4>
    <input type="hidden" name="id" value="{{$section_1->id}}">
    <div class="col-sm-12 col-md-2">
        <label for="">Título</label>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section_1->content_1}}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <textarea name="content_2" id="content_2" class="form-control ckeditor" cols="30" rows="4">{{$section_1->content_2}}</textarea>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <input type="text" name="content_3" value="{{$section_1->content_3}}" class="form-control">
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <input type="file" name="image" class="form-control-file">
            <small>Política de Calidad 1</small>
        </div> 
        @if (Storage::disk('public')->exists($section_1->image))
            <button class="btn btn-sm btn-danger delete" data-url="{{ route('quality.politic.destroy', ['column' => 'image', 'id'=> $section_1->id]) }}">Eliminar</button>
        @endif
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <input type="file" name="content_4" class="form-control-file">
            <small>Política de Calidad 2</small>
        </div> 
        @if (Storage::disk('public')->exists($section_1->content_4))
            <button class="btn btn-sm btn-danger delete" data-url="{{ route('quality.politic.destroy', ['column' => 'content_4', 'id'=> $section_1->id]) }}">Eliminar</button>
        @endif
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <input type="file" name="content_5" class="form-control-file">
            <small>Política de Calidad 3</small>
        </div> 
        @if (Storage::disk('public')->exists($section_1->content_5))
            <button class="btn btn-sm btn-danger delete" data-url="{{ route('quality.politic.destroy', ['column' => 'content_5', 'id'=> $section_1->id]) }}">Eliminar</button>
        @endif
    </div>
    <div class="text-right col-sm-12">
        <button type="submit" class="btn btn-primary update">Actualizar</button>
    </div>
</form>
@includeIf('administrator.quality.modals.create-slider')
@includeIf('administrator.quality.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('quality.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/quality/index.js') }}"></script>
@stop

