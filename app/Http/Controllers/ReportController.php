<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function comprovativo($pagamento_id)
    {
        $pagamento = Pagamento::findOrFail($pagamento_id);

        $pdf = PDF::loadView('reports.comprovativo', compact('pagamento'))->setPaper('A4', 'normal');
        return $pdf->stream("Comprovativo.pdf");
    }
}
