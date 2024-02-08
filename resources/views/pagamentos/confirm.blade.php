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
                <form method="POST" action="/pagamentos">
                    @method('POST')
                    @csrf

                    <div class="row">
                        @include('include.message')

                       <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                              <div class="col-title mb-2"><span class="bold">Nome Completo:</span> {{ $pessoa->nome }}</div>
                              <div class="col-title mb-2"><span>Nº do Bilhete:</span> {{ $pessoa->bi }}</div>
                              <div class="col-title mb-2"><span>Nº de Telefone:</span> {{ $pessoa->telefone }}</div>
                              <div class="col-title mb-2"><span>Mês:</span> {{ $mes->mes }}</div>
                              <div class="col-title mb-2"><span>Ano:</span> {{ $data['ano'] }}</div>
                              <div class="col-title mb-2"><span>Viatura:</span> {{ $viatura->matricula }} [{{ $viatura->marca }} - {{ $viatura->modelo }}]</div>
                              <div class="col-title mb-2"><span>Preço:</span> {{ number_format($data['valor'], 2,',','.') }}</div>
                              <div class="col-title mb-2"><span>Data do Pagamento:</span> {{ date('d-m-Y', strtotime($data['data_pagamento'])) }}</div>
                            </div>
                        </div>
                       </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Confirmar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
