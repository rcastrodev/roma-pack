<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('findFilmAlimentos', ['id' => $subCategory->id]) }}" class="mas position-absolute text-decoration-none text-white"><i class="fas fa-plus"></i></a>
        @if (Storage::disk('public')->exists($subCategory->image))
            <img src="{{ asset($subCategory->image) }}" class="img-fluid image-card">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid image-card">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text">
            <a href="{{ route('findFilmAlimentos', ['id' => $subCategory->id]) }}" class="text-decoration-none font-size-14 text-uppercase text-center d-block text-dark fw-500">{{$subCategory->name}}</a>
        </p>
    </div>
</div>


