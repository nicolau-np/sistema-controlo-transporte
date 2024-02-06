<?php

namespace App\Http\Controllers;

use App\Models\Meses;
use App\Models\Pagamento;
use App\Models\Pessoa;
use App\Models\TabelaPreco;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{

    public function create($bi = null)
    {
        $pessoa = null;
        if ($bi) {
            $pessoa = Pessoa::where('bi', $bi)->whereHas('estudante')->first();
            if (!$pessoa)
                return back()->with('error', 'Bilhete de Identidade Inválido');
        }
        $meses = Meses::orderBy('id', 'asc')->get();
        $tabela_preco = TabelaPreco::orderBy('id', 'desc')->get()->first();
        $title = 'Pagamentos';
        $menu = 'Pagar';
        $type = 'pagamentos';

        return view('pagamentos.create', compact('title', 'menu', 'type', 'bi', 'meses', 'tabela_preco', 'pessoa'));
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

        $pagamento = Pagamento::where(['mes_id' => $request->mes_id, 'ano' => $request->ano])->first();
        if ($pagamento)
            return back()->with('error', 'Já efectuou o pagamento para o Mês selecionado!');


        $data = [
            'estudante_id' => $pessoa->estudante->first()->id,
            'mes_id' => $request->mes_id,
            'ano' => $request->ano,
            'valor' => $request->preco,
        ];

        $title = 'Pagamentos';
        $menu = 'Confirmar Pagamento';
        $type = 'pagamentos';

        return view('pagamentos.confirm', compact('title', 'menu', 'type', 'data'));
    }

    public function store()
    {
    }
}
