<?php

namespace App\Http\Controllers;

use App\Models\Meses;
use App\Models\Pagamento;
use App\Models\Pessoa;
use App\Models\TabelaPreco;
use App\Models\Viatura;
use Carbon\Carbon;
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

        $tabela_preco = TabelaPreco::orderBy('id', 'desc')->get()->first();
        $title = 'Pagamentos';
        $menu = 'Pagar';
        $type = 'pagamentos';

        return view('pagamentos.create', compact('title', 'menu', 'type', 'bi', 'tabela_preco', 'pessoa'));
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
            'viatura_id' => 'required|integer|exists:viaturas,id',
            'preco' => 'required|numeric|exists:tabela_precos,preco',
            'data_pagamento' => 'required|date',
            'ano' => 'required|integer|in:' . Carbon::now()->year,
        ], [], [
            'bi' => "Nº do Bilhete",
            'mes_id' => "Mês",
            'viatura_id' => "Viatura",
            'preco' => 'Preço',
            'data_pagamento' => "Data do Pagamento",
            'ano' => 'Ano',
        ]);

        $pessoa = Pessoa::where('bi', $request->bi)->whereHas('estudante')->first();
        if (!$pessoa)
            return back()->with('error', 'Bilhete de Identidade Inválido');

        $mes = Meses::findOrFail($request->mes_id);
        $viatura = Viatura::findOrFail($request->viatura_id);

        $pagamento = Pagamento::where(['mes_id' => $request->mes_id, 'ano' => $request->ano, 'estudante_id' => $pessoa->estudante->first()->id])->first();
        if ($pagamento)
            return back()->with('error', "Já efectuou o pagamento para o Mês de $mes->mes");

        $data = [
            'estudante_id' => $pessoa->estudante->first()->id,
            'mes_id' => $request->mes_id,
            'viatura_id' => $request->viatura_id,
            'ano' => $request->ano,
            'data_pagamento' => $request->data_pagamento,
            'valor' => $request->preco,
        ];

        Session::put('dataPagamento', $data);

        $title = 'Pagamentos';
        $menu = 'Confirmar Pagamento';
        $type = 'pagamentos';

        return view('pagamentos.confirm', compact('title', 'menu', 'type', 'data', 'pessoa', 'mes', 'viatura'));
    }

    public function store(Request $request)
    {
        if (!Session::has('dataPagamento'))
            return back()->with('error', 'Erro ao confirmar Pagamento. Tente Novamente');

        $pagamento = Pagamento::create(Session::get('dataPagamento'));
        if ($pagamento) {
            Session::forget('dataPagamento');
            return redirect('/reports/comprovativo/'.$pagamento->id)->with('success', 'Pagamento Efectuado com sucesso');
        }
    }

    public function destroy(string $id)
    {
        $pagamento = Pagamento::findOrFail($id);

        $pagamento->delete();

        return redirect("/pagamentos")->with('success', "Pagamento eliminado com sucesso");
    }
}
