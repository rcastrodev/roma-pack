@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
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
                    <th>Pre título</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{{-- 
  @isset($section2)
    <form action="{{ route('home.content.generic-section.update') }}" method="post" class="row mt-5 mb-5" enctype="multipart/form-data" data-asyn="no">
        @csrf
        <h4 class="col-sm-12 mb-4">Nosotros</h4>
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <label for="">Imagen de fondo</label>
                <input type="file" name="image" class="form-control-file">
                <small>la imagen debe ser al menos 1366x210</small>
            </div> 
            @if (Storage::disk('public')->exists($section2->image))
                <img src="{{ asset($section2->image) }}" class="img-fluid"> 
            @endif
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <label for="">Logo 1</label>
                <input type="file" name="content_1" class="form-control-file">
                <small>la imagen debe ser al menos 235x155</small>
            </div> 
            @if (Storage::disk('public')->exists($section2->content_1))
                <img src="{{ asset($section2->content_1) }}" class="img-fluid"> 
            @endif
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <label for="">Logo 2</label>
                <input type="file" name="content_2" class="form-control-file">
                <small>la imagen debe ser al menos 235x155</small>
            </div>
            @if (Storage::disk('public')->exists($section2->content_2))
                <img src="{{ asset($section2->content_2) }}" class="img-fluid"> 
            @endif 
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <label for="">Logo 3</label>
                <input type="file" name="content_3" class="form-control-file">
                <small>la imagen debe ser al menos 235x155</small>
            </div> 
            @if (Storage::disk('public')->exists($section2->content_3))
                <img src="{{ asset($section2->content_3) }}" class="img-fluid"> 
            @endif
        </div>
        <div class="text-right col-sm-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>  
@endisset  
--}}


@includeIf('administrator.home.modals.create-slider')
@includeIf('administrator.home.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

