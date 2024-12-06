<!-- resources/views/myPDF.blade.php -->

@extends('layouts.pfinicio')

@section('content')
    <h1>Detalles del Usuario</h1>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Apellido</th>
                <th>Avatar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $trainer->id }}</td>
                <td>{{ $trainer->name }}</td>
                <td>{{ $trainer->apellido }}</td>
                <td class="text-right">
                    @if(file_exists(public_path('images/' . $trainer->avatar)))
                        <img src="{{ public_path('images/' . $trainer->avatar) }}" style="width: 50px; height: 50px;" alt="Avatar">
                    @else
                        <p>Imagen no disponible</p>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
@endsection

