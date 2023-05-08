@extends('template.mainadmin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/afegir-admin.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/afegir-admin.js') }}"></script>
@endpush

@section('content')
    <div class="centrar">
        <form action="{{ route('import-users') }}" method="POST" enctype="multipart/form-data" class="form-file"
            accept-charset="UTF-8" accept-language="ca">
            @csrf
            <div class="form-group">
                <label for="arxiu" class="form-label">Selecciona l'arxiu excel per afegir els treballadors:</label>
                <input type="file" id="file" name="file" class="form-input">
            </div>
            <button type="submit" class="form-btn">Pujar arxiu</button>
        </form>
    </div>

    {{--     <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo electrónico</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
@endsection
