@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none font-weight-600" style="color: black;">Home</a>
                </li>
                <li class="breadcrumb-item active color-azul-claro" aria-current="page" style="color: black;">Productos</li>
            </ol>
        </nav>
    </div>
</div>
<div>
    <div class="container">
        <div class="">
            @if (count($products))
                <section class="producto row font-size-14 my-5">
                    @if ($products)
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.producto', ['producto' => $product])
                            </div>                  
                        @endforeach
                    @endif                   
                </section>    
            @else
                <h2 class="text-center my-5">No se encontraron productos</h2>
            @endif
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
