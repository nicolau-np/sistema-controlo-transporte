<?php

namespace App\Http\Controllers;

use App\Models\Meses;
use App\Models\Pagamento;
use App\Models\Pessoa;
use App\Models\TabelaPreco;
use App\Models\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagamentoController extends Controller
{

    public function index()
    {

        $pagamentos = Pagamento::orderBy('id', 'desc')->paginate(20);
        $title = 'Pagamentos';
        $menu = 'Listar Pagamentos';
        $type = 'pagamentos';

        return view('pagamentos.index', compact('title', 'menu', 'type', 'pagamentos'));
    }

    public function create($bi = null)
    {
        $pessoa = null;
        if ($bi) {
            $pessoa = Pessoa::where('bi', $bi)->whereHas('estudante')->first();
            if (!$pessoa)
                return back()->with('error', 'Bilhete de Identidade Inválido');
        }
        $viaturas = Viatura::orderBy('id', 'asc')->get();
        $meses = Meses::orderBy('id', 'asc')->get();
        $tabela_preco = TabelaPreco::orderBy('id', 'desc')->get()->first();
        $title = 'Pagamentos';
        $menu = 'Pagar';
        $type = 'pagamentos';

        return view('pagamentos.create', compact('title', 'menu', 'type', 'bi', 'meses', 'tabela_preco', 'pessoa', 'viaturas'));
    }

    public function show($id)
    {
        $pagamento = Pagamento::findOrFail($id);

        $title = 'Pagamentos';
        $menu = 'Detalhes do Pagamento';
        $type = 'pagamentos';

        return view('pagamentos.show', compact('title', 'menu', 'type', 'pagamento'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'bi' => 'required|string|exists:pessoas,bi',
            'mes_id' => 'required|integer|exists:meses,id',
            'preco' => 'required|numeric|exists:tabela_precos,preco',
            'ano' => 'required|integer',
        ], [], [
            'bi' => "Nº do Bilhete",
            'mes_id' => "Mês",
            'preco' => 'Preço',
            'ano' => 'Ano',
        ]);

        $pessoa = Pessoa::where('bi', $request->bi)->whereHas('estudante')->first();
        if (!$pessoa)
            return back()->with('error', 'Bilhete de Identidade Inválido');

        $mes = Meses::findOrFail($request->mes_id);

        $pagamento = Pagamento::where(['mes_id' => $request->mes_id, 'ano' => $request->ano])->first();
        if ($pagamento)
            return back()->with('error', "Já efectuou o pagamento para o Mês de $mes->mes");

        $data = [
            'estudante_id' => $pessoa->estudante->first()->id,
            'mes_id' => $request->mes_id,
            'ano' => $request->ano,
            'valor' => $request->preco,
        ];

        Session::put('data_pagamento', $data);

        $title = 'Pagamentos';
        $menu = 'Confirmar Pagamento';
        $type = 'pagamentos';

        return view('pagamentos.confirm', compact('title', 'menu', 'type', 'data', 'pessoa', 'mes'));
    }

    public function store(Request $request)
    {
        if (!Session::has('data_pagamento'))
            return back()->with('error', 'Erro ao confirmar Pagamento. Tente Novamente');

        $pagamento = Pagamento::create(Session::get('data_pagamento'));
        if ($pagamento) {
            Session::forget('data_pagamento');
            return redirect('/pagamentos/create')->with('success', 'Pagamento Efectuado com sucesso');
        }
    }
}
