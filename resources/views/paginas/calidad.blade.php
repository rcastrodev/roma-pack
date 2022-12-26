@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item active color-link-gris" aria-current="page">Calidad</li>
            </ol>
        </nav>  
    </div>
</div>
@isset($section1)
	<section id="section_2" class="py-sm-2 py-md-4">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6 mb-4">
					<h4 class="text-red mb-4 font-size-21 fw-bold">{{ $section1->content_1}}</h4>
					<div class="fw-500 font-size-16">{!! $section1->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="row mb-5">
						@foreach ($section2s as $image)
							<div class="col-sm-12 col-md-4">
								<img src="{{ asset($image->image) }}" class="img-fluid d-block mx-auto">
							</div>
						@endforeach
					</div>
					<div class="bg-light d-flex align-items-center justify-content-between p-3">
						<div class="">
							<div class="mb-2 font-size-17 text-red fw-600">{{$section1->content_3}}</div>
							<div class="font-size-14" style="color: #7E90A1;">DESCARGAR</div>
						</div>
						<div class="">
							@if ($section1->image)
								<a href="{{ route('ficha-tecnica-politica', ['id'=> $section1->id, 'campo' => 'image']) }}" class="postion-absolute"><i class="fas fa-download text-red font-size-21"></i></a>				
							@endif
							@if ($section1->content_4)
								<a href="{{ route('ficha-tecnica-politica', ['id'=> $section1->id, 'campo' => 'content_4']) }}" class="postion-absolute"><i class="fas fa-download text-red font-size-21"></i></a>				
							@endif
							@if ($section1->content_5)
								<a href="{{ route('ficha-tecnica-politica', ['id'=> $section1->id, 'campo' => 'content_5']) }}" class="postion-absolute"><i class="fas fa-download text-red font-size-21"></i></a>				
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
@endisset
@endsection
@push('head')
@endpush
