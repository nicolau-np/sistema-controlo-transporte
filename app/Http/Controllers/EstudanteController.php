<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Estudante;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudantes = Estudante::orderBy('id', 'asc')->paginate(10);
        $title = 'Estudantes';
        $menu = 'Listar';
        $type = 'estudantes';

        return view('estudantes.index', compact('title', 'menu', 'type', 'estudantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = 'Estudantes';
        $menu = 'Novo';
        $type = 'estudantes';

        return view('estudantes.create', compact('title', 'menu', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $title = 'Estudantes';
        $menu = 'Editar';
        $type = 'estudantes';

        return view('estudantes.edit', compact('title', 'menu', 'type', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function extrato($estudante_id){
        $estudante = Estudante::findOrFail($estudante_id);
        $pagamentos = Pagamento::where('estudante_id', $estudante_id)->get();
        $title = 'Estudantes';
        $menu = 'Extrato';
        $type = 'estudantes';

        return view('estudantes.extrato', compact('title', 'menu', 'type', 'estudante', 'pagamentos'));
    }
}
