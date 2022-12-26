@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row product">
            @csrf
            <div class="form-group col-sm-12 col-md-5">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-5">
                <label for="">Categoría</label>
                <select name="sub_category_id" id="sub_category_id" class="form-control select2">
                    @foreach ($subCategories as $subCategory)
                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="name" value="{{old('order')}}" class="form-control" placeholder="Ej AA BB">
            </div>
            <div class="form-group col-sm-12 col-md-4 sw">
                <label>Ficha técnica</label>
                <input type="file" name="data_sheet" class="form-control-file">
            </div>   
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="form-control ckeditor" cols="30" rows="5">{{old('description')}}</textarea>
            </div>      
            @for ($i = 1; $i <= 3; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image{{$i}}">imagen {{$i}}</label> <small>Tamaño recomendado 500x261 px</small>
                    <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
                </div>           
            @endfor
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>        
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

