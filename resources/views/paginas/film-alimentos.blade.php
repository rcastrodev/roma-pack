@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13 br">
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{!! $category->name !!}</li>                
            </ol>
        </nav>  
    </div>
</div>
<div class="mb-5">
    <div class="py-2">
        <div class="containter-custom text-center mx-auto fw-500" style="color: #27272B;">{!! $category->content_1 !!}</div>
    </div>
    <div id="subCategorias">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-12 col-md-6 mb-sm-3 mb-md-2">
                        @includeIf('paginas.partials.producto-film-alimentos', ['producto' => $product])
                    </div>					
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
