@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13 m-0">
                <li class="breadcrumb-item active color-azul-claro" aria-current="page" style="color: black;">contacto</li>
            </ol>
        </nav>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.982863218119!2d-58.58604598514532!3d-34.705612170402794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc671e381abaf%3A0x72be29c03161018b!2sRoma%20Pack!5e0!3m2!1ses!2sve!4v1634173215756!5m2!1ses!2sve" height="600" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <h1 class="text-red font-size-18 mb-3 fw-bold">ROMAPACK</h1>
                    <div class="d-flex mb-2">
                        <i class="fas fa-map-marker-alt text-blue font-size-20 d-block me-2 mb-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="fas fa-phone-alt text-blue font-size-20 me-2 mb-3"></i>  
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class="text-decoration-none underline text-dark">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{$data->phone1}}" class="text-decoration-none underline text-dark">{{ $data->phone1 }}</a>
                        @endif
                    </div>
                    <div class="d-flex mb-2">
                        <i class="fab fa-whatsapp text-blue font-size-20 me-2 mb-3"></i> 
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @if (count($phone2) == 2)
                            <a href="https://wa.me/{{$phone2[0]}}" class="text-decoration-none underline text-dark">{{ $phone2[1] }}</a>
                        @else 
                            <a href="https://wa.me/{{$data->phone2}}" class="text-decoration-none underline text-dark">{{ $data->phone2 }}</a>
                        @endif 
                    </div>
                    <div class="d-flex mb-2">
                        <i class="far fa-envelope text-blue font-size-20 d-block me-2 mb-3"></i><span class="d-block">{{ $data->email }}</span>                        
                    </div>
                </div>          
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="empresa" placeholder="Empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12  mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn text-white bg-red font-size-14 py-2 px-4 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('head')
@endpush
