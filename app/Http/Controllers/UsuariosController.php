<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all()->toArray();
        return array_reverse($usuarios);      
    }
    public function store(Request $request)
    {
        $usuarios = new Usuarios([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'birthdate' => $request->input('birthdate'),
            'city' => $request->input('city')
        ]);
        $usuarios->save();
        return response()->json('Usuario created!');
    }
    public function show($id)
    {
        $usuarios = Usuarios::find($id);
        return response()->json($usuarios);
    }
    public function update($id, Request $request)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->update($request->all());
        return response()->json('Usuario updated!');
    }
    public function destroy($id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->delete();
        return response()->json('Usuario deleted!');
    }
}
