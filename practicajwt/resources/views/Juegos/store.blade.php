@extends('/Juegos/template')

@section('title', 'Update')

@section('content')
<div class="card" style="width: 18rem; margin: 0 auto; float: none; margin-bottom: 10px;">
    <div class="card-body">
        <h5 class="card-title">Actualizar Juego</h5>
        <form action="{{ route('juegos.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="Nombre" class="form-label fs-6">Nombre del Juego</label>
            <input type="text" class="form-control" id="Nombre" name="nombre" ">
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label fs-6">Descripcion</label>
            <input type="text" class="form-control" id="Description" name="description">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label fs-6">Precio</label>
            <input type="text" class="form-control" id="Precio" name="precio">
            @error('precio')
            <div class="alert alert-danger fs-6">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Desarrolador" class="form-label fs-6">Desarrolador</label>
            <input type="text" class="form-control" id="Desarrolador" name="desarrollador">
            @error('desarrollador')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</div>
@endsection