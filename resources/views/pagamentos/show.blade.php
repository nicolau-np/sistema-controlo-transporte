@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            @include('include.message')

            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="col-title mb-2"><span class="bold">Nome Completo:</span>
                            {{ $pagamento->estudante->pessoa->nome }}</div>
                        <div class="col-title mb-2"><span>Nº do Bilhete:</span> {{ $pagamento->estudante->pessoa->bi }}</div>
                        <div class="col-title mb-2"><span>Nº de Telefone:</span>
                            {{ $pagamento->estudante->pessoa->telefone }}</div>
                        <div class="col-title mb-2"><span>Mês:</span> {{ $pagamento->mes->mes }}</div>
                        <div class="col-title mb-2"><span>Ano:</span> {{ $pagamento->ano }}</div>
                        <div class="col-title mb-2"><span>Viatura:</span> {{ $pagamento->viatura->matricula }}
                            [{{ $pagamento->viatura->marca }} - {{ $pagamento->viatura->modelo }}]</div>
                        <div class="col-title mb-2"><span>Preço:</span> {{ number_format($pagamento->valor, 2, ',', '.') }}
                        </div>
                        <div class="col-title mb-2"><span>Data do Pagamento:</span>
                            {{ date('d-m-Y', strtotime($pagamento->data_pagamento)) }}</div>
                    </div>
                    @if (Auth::user()->nivel_acesso == 'admin')
                        <div class="card-footer">
                            <form action="/pagamentos/{{ $pagamento->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger mr-4">
                                            <i class="fas fa-trash"></i>
                                            Eliminar
                                        </button>

                                        <a href="/reports/comprovativo/{{ $pagamento->id }}"
                                            class="btn btn-primary"><i class="fas fa-print"></i> Imprimir
                                            Comprovativo</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    @endif

                </div>

            </div>

        </div>
    @endsection
