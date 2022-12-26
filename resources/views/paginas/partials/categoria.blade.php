<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('categoria', ['categoria' => $category->name]) }}" class="mas position-absolute text-decoration-none text-white" style="font: normal normal 300 55px/66px Lato;"></a>
        @if (isset($category->image))
            <img src="{{ asset($category->image) }}" class="img-fluid image-card">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid image-card">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text">
            <a href="{{ route('categoria', ['categoria' => $category->name]) }}" class="color-primario text-decoration-none font-size-18 text-uppercase">{{$category->name}}</a>
        </p>
    </div>
</div>


