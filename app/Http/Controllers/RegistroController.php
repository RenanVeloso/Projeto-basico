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
        ],[
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres',
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

        return redirect('/usuarios')->with('success', 'Usuário excluído com sucesso!');
    }


    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('editar-usuario', compact('usuario'));
    }




    public function atualizarUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'senha' => 'sometimes|required|string|min:6|confirmed',
        ]);

        $usuario->name = $request->nome;
        $usuario->email = $request->email;

        if ($request->has('senha')) {
            $usuario->password = bcrypt($request->senha);
        }
        $usuario->save();

        return redirect('/usuarios')->with('success', 'Usuário editado com sucesso!');
    }
}
