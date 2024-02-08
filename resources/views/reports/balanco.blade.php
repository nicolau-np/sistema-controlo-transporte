<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprovativo</title>

    <style>
        @page {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 17.5pt;
        }

        .header-min {
            text-align: center;
        }

        .col-title span {
            font-weight: bold;
            color: #4B70DD;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>Faculdade de Medicina da Universidade Mandume Ya Ndemufayo.</h3>
    </div>

    <div class="header-min">
        <h4>Balanço de Pagamentos de Transporte</h4>
    </div>

    <div class="body">
        <div class="card">
            <div class="card-body">
                <div class="col-title mb-2"><span class="bold">Data Inicial:</span>
                    {{ date('d-m-Y', strtotime($data_inicial)) }}</div>
                <div class="col-title mb-2"><span>Data Final:</span> {{ date('d-m-Y', strtotime($data_final)) }}</div>
            </div>
        </div>

        <div class="total">
            <h3>Total Arrecadado (Akz): {{ number_format($pagamentos->sum('valor'), 2, ',', '.') }}</h3>
        </div>
    </div>
</body>

</html>
