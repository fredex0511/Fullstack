@extends('/Juegos/template')

<head>
    @section('title', 'Index')
</head>
@section('content')
    <form action="{{ route('juegos.store') }}" method="POST">
    @csrf


    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre del Juego</label>
        <input type="text" class="form-control" id="Nombre" name="nombre">
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="Description" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="Description" name="description">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="Precio" class="form-label">Precio</label>
        <input type="text" class="form-control" id="Precio" name="precio">
        @error('precio')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="Desarrollador" class="form-label">Desarrollador</label>
        <input type="text" class="form-control" id="Desarrollador" name="desarrollador">
        @error('desarrollador')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection