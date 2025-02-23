@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Trabajadores</h1>
        <a href="{{ route('trabajadores.create') }}" class="btn btn-primary">Crear Trabajador</a>
        <hr>
        <table style="width:50%; border: 1px solid black; border-collapse: collapse">
            <tr style="border: 1px solid black; border-collapse: collapse">
                <th>Nombre</th>
                <th>Rol</th>
            </tr>
            @foreach ($trabajadores as $trabajador)
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse">{{ $trabajador->nombre }}</td>
                    <td style="border: 1px solid black; border-collapse: collapse">{{ $trabajador->rol }}</td>
                </tr>
            @endforeach
        </table>
        {{ $trabajadores->links() }}
    </div>
@endsection