@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                @include('include.message')

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Data do Pagamento</th>
                                <th>Mês</th>
                                <th>Preço</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagamentos as $pagamento)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($pagamento->data_pagamento)) }}</td>
                                    <td>{{ $pagamento->mes->mes }}</td>
                                    <td>{{ number_format($pagamento->valor,2,',','.') }}</td>

                                    <td>
                                        <a href="/pagamentos/{{ $pagamento->id }}" class="btn btn-warning ml-3">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="paginate">
            {{ $pagamentos->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
