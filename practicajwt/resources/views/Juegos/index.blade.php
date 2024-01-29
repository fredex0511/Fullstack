@extends('/Juegos/template')
<head>
    @section('title', 'Index')
</head>
@section('content')
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre del Juego</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Desarrollador</th>
        <th scope="col">Eliminar</th>
        <th scope="col">Modificar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $juego)
        <tr>
            <th scope="row">{{ $juego->id }}</th>
            <td>{{ $juego->nombre }}</td>
            <td>{{ $juego->description }}</td>
            <td>{{ $juego->precio }}</td>
            <td>{{ $juego->desarrollador }}</td>
            <td>
                <form action="{{ route('juegos.destroy', $juego) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg"></button>
                </form>
            </td>
            <td>
                <a href="{{ route('juegos.edit', $juego) }}" class="btn btn-success btn-lg"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection