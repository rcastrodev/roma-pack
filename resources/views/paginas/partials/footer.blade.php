<footer class="font-size-14 text-sm-center text-md-start bg-dark">
    <div class="row justify-content-between container mx-auto">
        <div class="col-sm-12 col-md-2 py-sm-3 py-md-5 plogo-footer" style="">
            <a href="{{ route('index') }}" class="d-sm-none d-md-block mb-3">
                <img src="{{ asset($data->logo) }}" class="img-fluid">
            </a>
            <div class="d-flex">
                {{-- 
                   <img src="{{ asset('images/Enmascarar_grupo_2-01.png') }}" class="img-fluid" width="100"> 
                --}}
                <img src="{{ asset('images/Enmascarar_grupo_4.png') }}" class="img-fluid" width="100">
            </div>
        </div>
        <div class="col-sm-12 col-md-5 py-sm-2 py-md-5 d-sm-none d-md-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <div class="col-sm-12 position-relative">
                            <h6 class="text-uppercase text-red font-weight-600 mb-4  after-footer">secciones</h6>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Home</a>
                            <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Empresa</a>
                            <a href="{{ route('filmStrech') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Film Stretch</a>
                            <a href="{{ route('filmTermocontraible') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Film Termocontraible</a>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <a href="{{ route('filmAlimentos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Film de alimentos</a>
                            <a href="{{ route('calidad') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Calidad</a>
                            <a href="{{ route('solicitar-presupuesto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Solicitar Presupuesto</a>
                            <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-13">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 font-size-13 px-sm-3 px-md-0 py-sm-3 py-md-5">
            <div class="row">
                <div class="col-sm-12 position-relative">
                    <h6 class="text-uppercase text-red font-weight-600 mb-4 after-footer">contacto</h6>
                </div>

                @if ($data->address)
                    <div class="col-sm-12 col-md-8">
                        <div class="d-flex mb-2">
                            <i class="fas fa-map-marker-alt text-red d-block me-2 font-size-20"></i>
                            <address class="d-block text-light m-0 font-size-13">{{ $data->address }}</address>
                        </div>
                    </div>           
                @endif

                @if ($data->phone1)
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex mb-2">
                            <i class="fas fa-phone-alt text-red d-block me-2 font-size-20"></i>
                            @php $phone = Str::of($data->phone1)->explode('|') @endphp
                            @if (count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-light text-decoration-none underline font-size-13">{{$phone[1]}}</a>
                            @else 
                                <a href="tel:{{$data->phone1}}" class="text-light text-decoration-none underline font-size-13">{{$data->phone1}}</a>
                            @endif
                        </div>
                    </div>          
                @endif

                @if ($data->email)
                    <div class="col-sm-12 col-md-8">
                        <div class="d-flex mb-2">
                            <i class="fas fa-envelope text-red d-block me-2 font-size-20"></i><span class="d-block"></span>
                            <a href="mailto:{{ $data->email }}" class="text-light text-decoration-none underline font-size-13">{{ $data->email }}</a>             
                        </div>
                    </div>
                @endif

                @if ($data->phone2)
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fab fa-whatsapp text-red d-block me-2 font-size-20"></i>
                            @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                            @if (count($phone2) == 2)
                                <a href="https://wa.me/{{$phone2[0]}}" class="text-light text-decoration-none underline font-size-13">{{$phone2[1]}}</a>
                            @else 
                                <a href="https://wa.me/{{$data->phone2}}" class="text-light text-decoration-none underline font-size-13">{{$data->phone2}}</a>
                            @endif
                        </div>
                    </div>             
                @endif
            </div>
        </div>
    </div>
</footer>