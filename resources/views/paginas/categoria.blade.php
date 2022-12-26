@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                @if ($path)
                    <li class="breadcrumb-item">
                        <a href="{{ route($path) }}" class=" text-decoration-none font-weight-600" style="color: black;">{{$text}}</a>
                    </li>              
                @endif
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>  
    </div>
</div>
<section class="productos m-sm-0 m-md-5">
    <div class="container">
        <div class="row">
            @if(count($products))
                @foreach ($products as $product)
                    <div class="col-sm-12 col-md-4 mb-sm-2 mb-md-5">
                        @includeIf('paginas.partials.producto', ['producto' => $product])
                    </div>                      
                @endforeach           
            @else
                <h2 class="my-5 text-center">No tenemos productos en esta categoría</h2>
            @endif
        </div>
    </div>
</section>
@endsection