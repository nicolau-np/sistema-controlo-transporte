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
                <form action="/pagamentos/search" method="POST">
                <div class="row mb-4">

                        <div class="col-md-8">
                            <input type="text" wire:model="text_search" class="form-control" id=""
                                placeholder="Pesquisar..." />
                        </div>
                        <div class="col-md-1 mr-3">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/pagamentos/create" class="btn btn-success">Novo</a>
                        </div>

                </div>
            </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>B.I</th>
                                <th>Nome</th>
                                <th>Mês</th>
                                <th>Ano</th>
                                <th>Preço</th>
                                <th>Data do Pagamento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagamentos as $pagamento)
                                <tr>
                                    <td>{{ $pagamento->estudante->pessoa->bi }}</td>

                                    <td>{{ $pagamento->estudante->pessoa->nome }}</td>
                                    <td>{{ $pagamento->mes->mes }}</td>
                                    <td>{{ $pagamento->ano }}</td>
                                    <td>{{ $pagamento->preco }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($pagamento->created_at)) }}</td>
                                    <td>
                                        <a href="/pagamentos/{{ $pagamento->bi }}" class="btn btn-warning ml-3">Detalhes</a>
                                      

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
