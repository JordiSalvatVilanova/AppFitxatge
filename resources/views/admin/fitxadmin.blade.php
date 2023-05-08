@extends('template.mainadmin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/fitxatge-admin.css') }}">
    <!-- CARRUSEL -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ asset('js/fitxatge-admin.js') }}"></script>
@endpush

@section('content')
    <div id="imatgeBody">
        <!-- TABLAAAAA -->
        <div id="centrar">
            <div id="tablaFichaje" class="col-md-7 table-responsive table-container">
                <table class="table table-dark table-striped" id="my-table">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Entrada</th>
                            <th scope="col" class="pausa-continuitat">Pausa</th>
                            <th scope="col" class="pausa-continuitat">Continuïtat</th>
                            <th scope="col">Sortida</th>
                            <th scope="col">Temps Total</th>
                            <th scope="col">Departament</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">23-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                        <tr>
                            <td scope="col">24-03-2023</td>
                            <td scope="col">23:50:30</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col" class="pausa-continuitat">-</td>
                            <td scope="col">07:50:30</td>
                            <td scope="col">8h</td>
                            <td scope="col">Matematiques</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
