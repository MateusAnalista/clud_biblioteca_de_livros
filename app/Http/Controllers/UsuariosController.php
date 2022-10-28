<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.list', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all()->pluck('titulo', 'id')->toArray();
       
        return view('admin.usuarios.create', compact('user'));
    }

    public function internalCreate()
    {
        return view('admin.usuarios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.usuarios.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $Usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $Usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.usuarios.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuariosRequest  $request
     * @param  \App\Models\Usuarios  $Usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        if(!is_null($request->password)):
            $user->password = Hash::make($request->password);
        endif;
        $user->save();

        return redirect()->route('admin.usuarios.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $Usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); // AQUI ELE PEGA O USUARIO DO BANCO E JA FAZ O DELETE 
        return redirect()->route('admin.usuarios.list'); // AQUI ELE ME RETORNA PARA LISTAS DE USUARIOS APOS DELETAR
    }

    public function admin()
    {
        return view('admin.admin'); 
    }
}
