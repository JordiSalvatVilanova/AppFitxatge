@extends('template.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cliente-inici.css') }}">
    <!-- CARRUSEL -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ asset('js/cliente-inici.js') }}"></script>
@endpush

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/retuladors.jpg') }}" alt="primer">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/verd.jpg') }}" alt="segundo">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/llapissos.jpg') }}" alt="tercero">
            </div>
        </div>
    </div>

    <span id="titol">
        <h1>IdentWork</h1>
        <h3>el teu fitxatge amb un sol click.</h3>
    </span>

    <!-- BOTONES -->
    <div class="btn-row row justify-content-center">
        <form role="form" action="{{ route('fitxatge.entrada') }}" method="post"
            @if ($fitxatge) class="d-none" @endif>
            @csrf
            <button type="submit" class="btn btn-outline-success m-2 col-10 col-sm-6 col-md-4 col-lg-2">
                <h3>Entrada</h3>
            </button>
        </form>
        <form role="form" action="{{ route('fitxatge.pausa') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-primary m-2 col-10 col-sm-6 col-md-4 col-lg-2">
                <h3>Pausa</h3>
            </button>
        </form>
        <form role="form" action="{{ route('fitxatge.continuacio') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-info m-2 col-10 col-sm-6 col-md-4 col-lg-2">
                <h3>Continuació</h3>
            </button>
        </form>
        <form role="form" action="{{ route('fitxatge.sortida') }}" method="post"
            @if (!$fitxatge) class="d-none" @endif>
            @csrf
            <button type="submit" class="btn btn-outline-danger m-2 col-10 col-sm-6 col-md-4 col-lg-2">
                <h3>Sortida</h3>
            </button>
        </form>
    </div>
@endsection
