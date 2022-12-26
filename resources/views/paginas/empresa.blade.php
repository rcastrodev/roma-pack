@extends('paginas.partials.app')
@section('content')
@if (count($sliders))
	<div id="sliderHeroEmpresa" class="carousel slide" data-bs-interval	="3000" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $v)
				<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" >
			@foreach ($sliders as $k => $v)
				<div class="carousel-item @if(!$k) active @endif">
					<img src="{{ asset($v->image) }}" class="d-block w-100" alt="...">
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@if ($company)
	<section id="section_2" class="py-sm-2 py-md-5">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6 mb-4">
					<h4 class="text-blue mb-4 font-size-18 fw-bold">{{ $company->content_1}}</h4>
					<div class="fw-500 font-size-15">{!! $company->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<img src="{{ asset($company->image) }}" class="img-fluid">
				</div>
			</div>
		</div>
	</section>	
@endif
@endsection
@push('head')
@endpush
