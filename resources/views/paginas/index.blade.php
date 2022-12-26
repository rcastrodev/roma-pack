@extends('paginas.partials.app')
@section('content')
@if(count($section1s))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($section1s as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
			@foreach ($section1s as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: url({{$slider->image}}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					<div class="containter mx-auto row">
						<div class="carousel-caption mt-sm-2 col-sm-12 col-md-4 text-start text-white">
							<h1 class="text-uppercase font-size-37 fw-bold">{{ $slider->content_1 }}</h1>
							<div class="d-sm-none d-md-block">{!! $slider->content_2 !!}</div> 
						</div>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($filmStretch)
	<section id="filmStretch" class="py-sm-4 py-md-5">
		<div class="container">
			<h2 class="mb-4 text-uppercase text-red font-size-22 fw-bold">FILM STRETCH</h2>
			@isset($products)
				@if (count($products))
					<div class="productosCarrusel">
						@foreach ($products as $product)
							@includeIf('paginas.partials.producto-film-strech', ['producto' => $product])
						@endforeach
					</div>					
				@endif
			@endisset
		</div>
	</section>
@endisset
@isset($filmAlimentos)
	<div id="filmAlimentos" class="py-sm-3 py-md-5" style="background-image: url({{asset($filmAlimentos->image)}}); background-position: center; background-size: 100% 100%;  background-repeat: no-repeat;">
		<div class="row container align-items-center py-sm-0 py-md-5" style="">
			<div class="col-sm-12 col-md-4 offset-sm-0  offset-md-1">
				<div class="fw-600 text-white font-size-45 mb-4" style="line-height: 50px;">{!! $filmAlimentos->name !!}</div>
				<div class="text-md-end text-sm-start">
					<a href="{{ route('filmAlimentos') }}" class="py-2 px-5 text-white text-decoration-none bg-red rounded-pill text-uppercase me-5">ver más</a>
				</div>
			</div>
		</div>
	</div>
@endisset
@isset($filmTermocontraible)
	<div id="filmAlimentos" class="bg-white py-sm-3 py-md-0">
		<div class="row container align-items-center">
			<div class="col-sm-12 col-md-7 mb-sm-2 mb-md-0">
				<img src="{{$filmTermocontraible->image}}" class="img-fluid d-block mx-auto">
			</div>
			<div class="col-sm-12 col-md-5">
				<div class="fw-600 font-size-45 mb-4 text-blue" style="line-height: 50px;">{!! $filmTermocontraible->name !!}</div>
				<div class="text-md-end text-sm-start">
					<a href="{{ route('filmTermocontraible') }}" class="py-2 px-5 text-white text-decoration-none bg-red rounded-pill text-uppercase">ver más</a>
				</div>
			</div>
		</div>
	</div>
@endisset
{{-- 
@isset($section2)
	<div id="section2" class="py-sm-4 py-md-0" style="background-image: url({{asset($section2->image)}}); background-position: center;
		background-size: 100% 100%; min-height: 210px; background-repeat: no-repeat;">
		<div class="row container mx-auto align-items-center" style="min-height: 210px;">
			<div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
				<img src="{{ asset($section2->content_1) }}" class="img-fluid mx-auto d-block">
			</div>
			<div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
				<img src="{{ asset($section2->content_2) }}" class="img-fluid mx-auto d-block">
			</div>
			<div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
				<img src="{{ asset($section2->content_3) }}" class="img-fluid mx-auto d-block">
			</div>
		</div>
	</div>
@endisset	
--}}
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
@endpush
@push('scripts')
	<script src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.productosCarrusel').slick({
				dots: true,
				infinite: false,
				speed: 300,
				slidesToShow: 4,
				slidesToScroll: 4,
				autoplay: true,
  				autoplaySpeed: 2000,
				responsive: [
					{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
					},
					{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
					},
					{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
					}
				]
			});
		})

	</script>
@endpush
