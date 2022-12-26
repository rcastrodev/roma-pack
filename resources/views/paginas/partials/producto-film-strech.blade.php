<div class="card producto">
    <div class="position-relative">  
        
        <a href="{{ route('productoFilmStrech', ['producto' => $producto->id]) }}
            " class="mas position-absolute text-decoration-none text-white" style="font: normal normal 300 55px/66px Lato;"><i class="fas fa-plus"></i></a>
        @if (count($producto->images))
            <img src="{{ asset($producto->images()->first()->image) }}" class="img-fluid" style="object-fit: contain;">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="object-fit: contain;">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text">
            <a href="{{ route('productoFilmStrech', ['producto' => $producto->id]) }}" class="text-decoration-none font-size-14 text-uppercase text-center d-block text-dark fw-500">{{ $producto->name }}</a>
        </p>
    </div>
</div>


