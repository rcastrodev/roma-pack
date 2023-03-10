@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-error')
    @includeIf('administrator.partials.mensaje-exitoso')
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos de la empresa</h3>
    </div>
    <form action="{{ route('data.content.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <input type="hidden" name="id" value="{{$company_id}}">
            <div class="form-group">
                <label class="mr-3">Descripción del sitio</label><small>importante para la indexación del sitio</small>
                <textarea name="description" class="ckeditor" cols="30" rows="10">{{$data->description}}</textarea>
            </div>
            <div class="form-group">
                <input type="text" name="address" value="{{$data->address}}" class="form-control" placeholder="Dirección de la empresa">
            </div>
            <div class="form-group">
                <input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="Email de la empresa">
            </div>
            <div class="form-group">
                <input type="text" name="phone1" value="{{$data->phone1}}" class="form-control" placeholder="Teléfono (1) de la empresa">
            </div>
            <div class="form-group">
                <input type="text" name="phone2" value="{{$data->phone2}}" class="form-control" placeholder="Número de whatsapp">
            </div>
            <div class="form-group">
                <input type="text" name="facebook" value="{{$data->facebook}}" class="form-control" placeholder="Link del canal de facebook">
            </div>
            <div class="form-group">
                <input type="text" name="instagram" value="{{$data->instagram}}" class="form-control" placeholder="Link del canal de instagram">
            </div>
            <div class="form-group">
                <input type="text" name="linkedin" value="{{$data->linkedin}}" class="form-control" placeholder="Link de linkedin">
            </div>
            @if (Storage::disk('public')->exists($data->logo))
                <div class="mb-3">
                    <img src="{{ asset($data->logo) }}" class="img-fluid" style="max-width: 100px; min-width: 100px;
                    max-height: 70px; min-height: 70px; object-fit: contain;">
                </div>                    
            @endif
            <div class="form-group">
                <label for="logoheader">Logo header</label>
                <input type="file" name="logo" class="form-control-file" id="logoheader">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
        </div>
    </form>
</div>      

@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

