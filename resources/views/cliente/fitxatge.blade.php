@extends('template.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/fitxatge-client.css') }}">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ asset('js/fitxatge-client.js') }}"></script>
@endpush

@section('content')
    <!-- CALENDARI -->
    <div id="calendarioContenedor">
        <div id="calendario">
            <div id="anterior" onclick="mesantes()"></div>
            <div id="posterior" onclick="mesdespues()"></div>
            <h2 id="titulos"></h2>
            <table id="diasc">
                <tr id="fila0">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr id="fila1">
                    <td id="01"></td>
                    <td id="02"></td>
                    <td id="03"></td>
                    <td id="04"></td>
                    <td id="05"></td>
                    <td id="06"></td>
                    <td id="07"></td>
                </tr>
                <!-- resto de filas de la tabla de días -->
                <tr id="fila2">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr id="fila3">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr id="fila4">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr id="fila5">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr id="fila6">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
            <div id="buscafecha">
                <form action="#" name="buscar">
                    <p class="textoCalendario">Buscar ... MES
                        <select name="buscames">
                            <option value="0">Enero</option>
                            <option value="1">Febrero</option>
                            <option value="2">Marzo</option>
                            <option value="3">Abril</option>
                            <option value="4">Mayo</option>
                            <option value="5">Junio</option>
                            <option value="6">Julio</option>
                            <option value="7">Agosto</option>
                            <option value="8">Septiembre</option>
                            <option value="9">Octubre</option>
                            <option value="10">Noviembre</option>
                            <option value="11">Diciembre</option>
                        </select>
                        ... AÑO ...
                        <input type="text" name="buscaanno" maxlength="4" size="4" />
                        ...
                        <input type="button" value="BUSCAR" onclick="mifecha()" />
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
