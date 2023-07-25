<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{
    public function exibirFormulario()
    {
        return view('registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'senha' => 'required|string|min:6|confirmed',
        ]);

        $usuario = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->senha),
        ]);

        return redirect('/usuarios')->with('success', 'Registro realizado com sucesso!');
    }

    public function mostrarUsuario()
    {
        $usuarios = User::all();
        return view('mostrar-usuario', compact('usuarios'));
    }

    public function excluirUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('mostrar-usuario')->with('success', 'Usuário excluído com sucesso!');
    }
}
