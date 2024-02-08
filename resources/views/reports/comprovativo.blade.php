<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprovativo</title>
</head>

<body>
    <div class="header">
        <h3>Faculdade de Medicina da Universidade Mandume Ya Ndemufayo.</h3>
    </div>

    <div class="header-min">
        <h5>Comprovativo de Pagamento</h5>
    </div>

    <div class="body">
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

        </div>
    </div>
</body>

</html>
