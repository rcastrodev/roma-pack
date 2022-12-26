@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{{ $filmStretch->name }}</li>                
            </ol>
        </nav>  
    </div>
</div>
<div class="mb-5">
    <div class="py-2">
        <div class="containter-custom text-center mx-auto fw-500" style="color: #27272B;">{!! $filmStretch->content_1 !!}</div>
    </div>
    <div id="subCategorias">
        <div class="container">
            <div class="row">
                @foreach ($filmStretch->subCategories as $subCategorie)
                    <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
                        @includeIf('paginas.partials.sub-category-strech', ['subCategory' => $subCategorie])
                    </div>					
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
