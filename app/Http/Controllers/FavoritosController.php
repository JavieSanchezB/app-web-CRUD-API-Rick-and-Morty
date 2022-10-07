<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    public function index()
    {
        $favoritos = Favoritos::all()->toArray();
        return array_reverse($favoritos);      
    }
    public function store(Request $request)
    {
        $favoritos = new Favoritos([
            'id_usuario' => $request->input('id_usuario'),
            'ref_api' => $request->input('ref_api'),
            
        ]);
        $favoritos->save();
        return response()->json('Favorito created!');
    }
    public function show($id)
    {
        $favoritos = Favoritos::find($id);
        return response()->json($favoritos);
    }
    public function update($id, Request $request)
    {
        $favoritos = Favoritos::find($id);
        $favoritos->update($request->all());
        return response()->json('Favorito updated!');
    }
    public function destroy($id)
    {
        $favoritos = Favoritos::find($id);
        $favoritos->delete();
        return response()->json('Favorito deleted!');
    }
}
