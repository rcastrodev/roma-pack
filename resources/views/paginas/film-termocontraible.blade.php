@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{!!$filmTermocontraible->name!!}</li>
            </ol>
        </nav>  
    </div>
</div>
<section class="py-md-5 py-sm-2">
    <div class="container mx-auto">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('public')->exists($filmTermocontraible->image_2))
                    <img src="{{ asset($filmTermocontraible->image_2) }}" class="img-fluid w-100 mb-sm-3 mb-md-0"> 
                @else
                    <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100 mb-sm-3 mb-md-0"> 
                @endif
            </div>
            <div class="col-sm-12 col-md-8 br text-sm-center text-md-start">
                <h1 class="text-red fw-bold font-size-21 mb-4">{!!$filmTermocontraible->name!!}</h1>
                <div class="fw-500">{!!$filmTermocontraible->content_1!!}</div>
                <div class="mt-5">
                    @if($filmTermocontraible->data_sheet)
                        <a href="{{ route('ficha-tecnica-categoria', ['id' => $filmTermocontraible->id]) }}" class="btn text-red fw-bold py-2 px-4 text-uppercase btn-outline-danger rounded-pill font-size-13 me-3 mb-sm-3 mb-md-0"><i class="fas fa-download text-red"></i> DESCARGAR FICHA</a>
                    @endif
                    <a href="{{ route('contacto') }}" class="btn bg-red text-white fw-bold py-2 px-5 text-uppercase rounded-pill font-size-13">Consultar</a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@push('head')
    <style>
        .breadcrumb-item br{
            display: none;
        }
        .br br{
            display: none;
        }
    </style>
@endpush
@push('scripts')
@endpush





