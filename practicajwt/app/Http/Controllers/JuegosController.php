<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Juego;

class JuegosController extends Controller
{
    public function index()
    {
        $data = Juego::all();

        return view('/Juegos/index' , ["data" => $data]);
    }

    public function store()
    {
        return view('/Juegos/store');
    }

    public function storeitem(Request $request)
    {
        $validador = $request->validate([
            'nombre' => 'required| string',
            'description' => 'required | string',
            'precio' => 'required | numeric',
            'desarrollador' => 'required | string',
        ]);
    
        $juego = new Juego();

        $juego->nombre = $request->nombre;
        $juego->description = $request->description;
        $juego->precio = $request->precio;
        $juego->desarrollador = $request->desarrollador;
        $juego->save();

        return redirect()->route('juegos.index');
    }

    public function delete(Juego $juego)
    {
        $juego->delete();

        return redirect()->route('juegos.index');
    }

    public function edit(Juego $juego)
    {
        return view('juegos.update', ['juego' => $juego]);
    }

    public function updateitem( Request $request)
    {
        $validador = $request->validate([
            'nombre' => 'required| string',
            'description' => 'required | string',
            'precio' => 'required | numeric',
            'desarrollador' => 'required | string',
        ]);
        $juego = Juego::find($request->id);
        $juego->nombre = $request->nombre;
        $juego->description = $request->description;
        $juego->precio = $request->precio;
        $juego->desarrollador = $request->desarrollador;

        $juego->save();

        return redirect()->route('juegos.index');
    }
}
