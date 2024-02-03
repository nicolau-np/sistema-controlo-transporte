<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('nivel_acesso','user')->orderBy('id', 'asc')->paginate(10);
        $title = 'Usuários';
        $menu = 'Listar';
        $type = 'users';

        return view('users.index', compact('title', 'menu', 'type', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = 'Usuários';
        $menu = 'Novo';
        $type = 'users';

        return view('users.create', compact('title', 'menu', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'username'=>'required|string|unique:users,username',
            'nivel_acesso'=>'required|string',
            'password'=>'required|string|min:6|confirmed',
            'password_confirmation'=>'required|string|min:6'
        ],[],[
            'name'=>'Nome Completo',
            'username'=>'Nome de Usuário',
            'nivel_acesso'=>'Nível de Acesso',
            'password'=>'Palavra-Passe',
            'password_confirmation'=>'Confirmar Palavra-Passe',
        ]);

        User::create($request->only('name', 'username', 'nivel_acesso', 'password'));

        return back()->with('success', 'Feito com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $title = 'Usuários';
        $menu = 'Editar';
        $type = 'users';

        return view('users.edit', compact('title', 'menu', 'type', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|string',
            'username'=>'required|string',
            'nivel_acesso'=>'required|string',
        ],[],[
            'name'=>'Nome Completo',
            'username'=>'Nome de Usuário',
            'nivel_acesso'=>'Nível de Acesso',
        ]);

        $user->update($request->all());

        return back()->with('success', 'Feito com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
