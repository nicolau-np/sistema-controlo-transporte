<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viaturas = Viatura::orderBy('id', 'asc')->paginate(10);
        $title = 'Viatura';
        $menu = 'Listar';
        $type = 'viaturas';

        return view('viaturas.index', compact('title', 'menu', 'type', 'viaturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Viatura';
        $menu = 'Novo';
        $type = 'viaturas';

        return view('viaturas.create', compact('title', 'menu', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'matricula'=>'required|string|unique:viaturas,matricula',
            'marca'=>'required|string',
            'modelo'=>'required|string',
            'numero_lugares'=>'required|string',
        ],[],[
            'matricula'=>'Matrícula',
            'marca'=>'Marca',
            'modelo'=>'Modelo',
            'numero_lugares'=>'Nº de Lugares',
        ]);

        Viatura::create($request->all());

        return back()->with('success', 'Feito com sucesso');
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
        $viatura = Viatura::findOrFail($id);

        $title = 'Viatura';
        $menu = 'Editar';
        $type = 'viaturas';

        return view('viaturas.edit', compact('title', 'menu', 'type', 'viatura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $viatura = Viatura::findOrFail($id);

        $this->validate($request, [
            'matricula'=>'required|string',
            'marca'=>'required|string',
            'modelo'=>'required|string',
            'numero_lugares'=>'required|string',
        ],[],[
            'matricula'=>'Matrícula',
            'marca'=>'Marca',
            'modelo'=>'Modelo',
            'numero_lugares'=>'Nº de Lugares',
        ]);

        $viatura->update($request->all());

        return back()->with('success', 'Feito com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
