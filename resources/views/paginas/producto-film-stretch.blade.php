@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('filmStrech') }}" class=" text-decoration-none font-weight-600" style="color: black;">Film Stretch</a>
                </li>          
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>  
    </div>
</div>
<div class="py-md-5 py-sm-2">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    @foreach ($products as $p)
                        <li class="py-2 @if($p->id == $product->id) active @endif" style="border-top: 1px solid #E9E9E9;
                            border-bottom: 1px solid #E9E9E9;  {{ ($product->id == $p->id) ? 'background-color: #E9E9E9;' : '' }}"> 
                            <a href="{{ route('productoFilmStrech', ['producto' => $p->id]) }}" class="d-block p-2 text-decoration-none text-dark fw-600 font-size-14 text-uppercase">{{$p->name}}</a>
                        </li>                        
                    @endforeach
                </ul>             
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6">
                        <div id="carouselProduct" class="carousel slide border border-light border-2 mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner" style="box-shadow: 0px 3px 6px #00000029;">
                                @if (count($product->images))
                                    @foreach ($product->images as $k => $pi)
                                        <div class="carousel-item  @if(!$k) active @endif">
                                            <img src="{{ asset($pi->image) }}" class="mx-auto w-100" alt="{{$product->name}}">
                                        </div>                                    
                                    @endforeach
                                @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default.jpg') }}" class="mx-auto w-100"> 
                                    </div>                                   
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h1 class="mb-3 font-size-21 text-uppercase fw-bold text-red mb-sm-3 mb-md-5">{{ $product->name }}</h1>
                        @if (count($product->variableProducts))
                            @if ($product->variableProducts()->first()->diameter || $product->variableProducts()->first()->width || $product->variableProducts()->first()->weight)
                                <div class="font-size-14 mb-5">
                                    @if ($product->variableProducts()->first()->diameter)
                                        <div class="mb-2">
                                            <strong class="fw-bold">Diámetro interno:</strong> <span>{{$product->variableProducts()->first()->diameter}}</span>
                                        </div>            
                                    @endif
                                    @if ($product->variableProducts()->first()->width)
                                        <div class="mb-2">
                                            <strong class="fw-bold">Ancho:</strong> <span>{{$product->variableProducts()->first()->width}}</span>
                                        </div>                               
                                    @endif      
                                    @if ($product->variableProducts()->first()->weight)
                                        <div class="mb-2">
                                            <strong class="fw-bold">Peso:</strong> <span>{{$product->variableProducts()->first()->weight}}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif                  
                        @endif
                        <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
                            @if($product->data_sheet)
                                <a href="{{ route('ficha-tecnica', ['id' => $product->id]) }}" class="btn text-red fw-bold py-2 px-4 text-uppercase btn-outline-danger rounded-pill font-size-13 me-3 mb-sm-3 mb-md-0"><i class="fas fa-download text-red"></i> DESCARGAR FICHA</a>
                            @endif
                            <a href="{{ route('contacto') }}" class="btn bg-red text-white fw-bold py-2 px-4 text-uppercase rounded-pill font-size-13 mb-sm-3 mb-md-0">Consultar</a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <h4 class="text-red font-size-13 fw-600 py-2 mb-4" style="border-top: 1px solid #b6bebb7a;">PRODUCTOS RELACIONADOS</h4>
                    <div class="row">
                        @foreach ($RPs as $rp)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.producto-film-strech', ['producto' => $rp])
                            </div>					
                        @endforeach
                    </div>
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





