<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\Pessoa;
use App\Models\Viatura;
use App\Models\ViaturaMotorista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motoristas = Motorista::orderBy('id', 'asc')->paginate(10);
        $title = 'Motorista';
        $menu = 'Listar';
        $type = 'motoristas';

        return view('motoristas.index', compact('title', 'menu', 'type', 'motoristas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Motorista';
        $menu = 'Novo';
        $type = 'motoristas';

        return view('motoristas.create', compact('title', 'menu', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|string|min:6',
            'bi' => 'required|regex:/^\d{9}[a-zA-Z]{2}\d{3}$/|unique:pessoas,bi',
            'telefone' => 'required|regex:/^9\d{8}$/',
            'numero_carta' => 'required|string',
        ], [], [
            'nome' => 'Nome Completo',
            'bi' => 'Nº de Bilhete',
            'telefone' => 'Nº de Telefone',
            'numero_carta' => 'Nº da Carta',
        ]);

        $data_motorista = [
            'pessoa_id' => null,
            'numero_carta' => $request->numero_carta
        ];

        $data_pessoa = [
            'nome' => $request->nome,
            'bi' => $request->bi,
            'telefone' => $request->telefone,
        ];

        return DB::transaction(function () use ($data_pessoa, $data_motorista) {
            $pessoa = Pessoa::create($data_pessoa);
            $data_motorista['pessoa_id'] = $pessoa->id;
            Motorista::create($data_motorista);
            return back()->with('success', 'Feito com sucesso');
        });
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
        $motorista = Motorista::findOrFail($id);
        $title = 'Motorista';
        $menu = 'Editar';
        $type = 'motoristas';

        return view('motoristas.edit', compact('title', 'menu', 'type', 'motorista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorista = Motorista::findOrFail($id);

        $this->validate($request, [
            'nome' => 'required|string|min:6',
            'bi' => 'required|regex:/^\d{9}[a-zA-Z]{2}\d{3}$/',
            'telefone' => 'required|regex:/^9\d{8}$/',
            'numero_carta' => 'required|string',
        ], [], [
            'nome' => 'Nome Completo',
            'bi' => 'Nº de Bilhete',
            'telefone' => 'Nº de Telefone',
            'numero_carta' => 'Nº da Carta',
        ]);

        $data_motorista = [
            'numero_carta' => $request->numero_carta
        ];

        $data_pessoa = [
            'nome' => $request->nome,
            'bi' => $request->bi,
            'telefone' => $request->telefone,
        ];

        return DB::transaction(function () use ($data_pessoa, $data_motorista, $motorista) {
            Pessoa::find($motorista->pessoa_id)->update($data_pessoa);

            Motorista::find($motorista->id)->update($data_motorista);
            return back()->with('success', 'Feito com sucesso');
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function viatura($motorista_id)
    {
        $motorista = Motorista::findOrFail($motorista_id);

        $viaturas = Viatura::all();
        $title = 'Motorista';
        $menu = 'Viatura';
        $type = 'motoristas';

        return view('motoristas.viatura', compact('title', 'menu', 'type', 'motorista', 'viaturas'));
    }

    public function saveViatura(Request $request, $motorista_id)
    {

        $motorista = Motorista::findOrFail($motorista_id);

        $request->validate([
            'viatura_id' => 'required|integer|exists:viaturas,id',
            'motorista_id' => 'required|integer|exists:motoristas,id',
            'data_atribuicao' => 'required|data',
        ], [], [
            'viatura_id' => 'Viatura',
            'motorista_id' => 'Motorista',
            'data_atribuicao' => 'Data de Atribuição',
        ]);

        $data_viatura_motorista = [
            'viatura_id'=>$request->viatura_id,
            'motorista_id'=>$motorista_id,
            'data_atribuicao'=>$request->data_atribuicao,
        ];
        
        ViaturaMotorista::create($data_viatura_motorista);

        return back()->with('success', 'Feito com sucesso');
    }
}
