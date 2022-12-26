@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('filmStrech') }}" class=" text-decoration-none font-weight-600" style="color: black;">Film Stretch</a>
                </li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{{$subCategory->name}}</li>
            </ol>
        </nav>  
    </div>
</div
<div>
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    @foreach ($subCategories as $sc)
                        <li class="py-2 @if($sc->name == $subCategory->name) active @endif"> 
                            <a href="#" class="toggle d-block p-2 text-decoration-none text-dark fw-600">{{$sc->name}}</a>
                            <ul class="mt-3 {{ ($sc->name == $subCategory->name) ? '' : 'rd-none' }}" style="list-style: none">
                                @foreach ($sc->products as $p)
                                    <li class="py-1">
                                        <a href="{{ route('productoFilmStrech', ['subCategoria' => Str::lower($sc->name), 'producto' => $p->id]) }}" class="text-decoration-none text-dark fw-600">{{$p->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>                        
                    @endforeach
                </ul>             
            </aside>
            <section class="col-sm-12 col-md-9">
                <div class="row">
                    @foreach ($subCategory->products as $product)
                        <div class="col-sm-12 col-md-4 mb-4">
                            @includeIf('paginas.partials.producto-film-strech', ['producto' => $product])
                        </div>					
				    @endforeach
			    </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush





