<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{

    public function index()
    {
        $title = 'Relatórios';
        $menu = 'Relatórios';
        $type = 'relatorios';

        return view('reports.index', compact('title', 'menu', 'type'));
    }

    public function balancoCreate()
    {
        $title = 'Relatórios';
        $menu = 'Balanço';
        $type = 'relatorios';

        return view('reports.balanco-create', compact('title', 'menu', 'type'));
    }

    public function balanco(Request $request)
    {
        $request->validate([
            'data_inicial' => 'required|date',
            'data_final' => 'required|date',
        ], [], [
            'data_inicial' => 'Data Incial',
            'data_final' => 'Data Final',
        ]);
        $data_inicial = $request->data_inicial;
        $data_final = $request->data_final;
        $pagamentos = Pagamento::whereBetween('data_pagamento', [$request->data_inicial, $request->data_final])->get();

        $pdf = PDF::loadView('reports.balanco', compact('pagamentos','data_inicial', 'data_final'))->setPaper('A4', 'normal');
        return $pdf->stream("balanco.pdf");
    }

    public function comprovativo($pagamento_id)
    {
        $pagamento = Pagamento::findOrFail($pagamento_id);

        $pdf = PDF::loadView('reports.comprovativo', compact('pagamento'))->setPaper('A4', 'normal');
        return $pdf->stream("Comprovativo.pdf");
    }
}
