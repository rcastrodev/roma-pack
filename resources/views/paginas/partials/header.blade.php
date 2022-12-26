<header class="header bg-blue py-0 d-sm-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 d-flex justify-content-between align-items-center flex-wrap">
                @if ($data->phone1)
                    <span>
                        <i class="fas fa-phone-alt text-white"></i>  
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none font-size-13 underline">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{$data->phone1}}" class="text-white text-decoration-none font-size-13 underline">{{ $data->phone1 }}</a>
                        @endif
                    </span>   
                @endif

                @if ($data->email)
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none underline">
                        <i class="fas fa-envelope text-white"></i> {{ $data->email }}
                    </a>             
                @endif
                
                @if ($data->phone2)
                    <span class="mb-xs-2 mb-md-0"> 
                        <i class="fab fa-whatsapp text-white"></i> 
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @if (count($phone2) == 2)
                            <a href="https://wa.me/{{$phone2[0]}}" class="text-white text-decoration-none font-size-13 underline">{{ $phone2[1] }}</a>
                        @else 
                            <a href="https://wa.me/{{$data->phone2}}" class="text-white text-decoration-none font-size-13 underline">{{ $data->phone2 }}</a>
                        @endif
                    </span>        
                @endif
            </div>
            <div class="col-sm-12 col-md-8 d-flex justify-content-end align-items-center ">
                <a href="{{ route('solicitar-presupuesto') }}" class="text-uppercase text-white py-2 px-3 @if(Request::is('solicitar-presupuesto')) header-active @endif">solicitar presupuesto</a>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light fondo-azul-oscuro">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if(Request::is('/')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('/')) active @endif" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('film-stretch') || Request::is('film-stretch/*')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('film-stretch') || Request::is('film-stretch/*')) active @endif" href="{{ route('filmStrech') }}">FILM STRETCH</a>
                </li>
                <li class="nav-item @if(Request::is('film-termocontraible')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('film-termocontraible')) active @endif" href="{{ route('filmTermocontraible') }}">FILM TERMOCONTRAIBLE</a>
                </li>
                <li class="nav-item @if(Request::is('film-de-alimentos') || Request::is('film-de-alimentos/*')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('film-de-alimentos') || Request::is('film-de-alimentos/*')) active @endif" href="{{ route('filmAlimentos') }}">FILM DE ALIMENTOS</a>
                </li>
                <li class="nav-item @if(Request::is('calidad')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}">CALIDAD</a>
                </li>
                <li class="nav-item d-sm-block d-md-none @if(Request::is('solicitar-presupuesto')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('solicitar-presupuesto')) active @endif" href="{{ route('solicitar-presupuesto') }}">SOLICITAR PRESUPUESTO</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) active position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" onclick="return gtag_report_conversion({{ route('contacto') }});">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
