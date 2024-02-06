@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
            <a href="/pagamentos" class="btn btn-success">Listar Pagamentos</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="/pagamentos/confirm">
                    @method('GET')
                    @csrf

                    <div class="row">
                        @include('include.message')

                        <div class="col-md-3 mb-3">
                            <label for="">Nº do Bilhete <span class="text-danger">*</span></label>
                            <input type="text" name="bi" placeholder="Nº do Bilhete" class="form-control"
                                value="{{ old('bi', $pessoa->bi ?? null) }}" />
                            @if ($errors->has('bi'))
                                <span class="text-danger">{{ $errors->first('bi') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Mês <span class="text-danger">*</span></label>
                            <select name="mes_id" class="form-control">
                                <option value="" hidden>Mês</option>
                                @foreach ($meses as $mes)
                                    <option value="{{ $mes->id }}">{{ $mes->mes }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mes_id'))
                                <span class="text-danger">{{ $errors->first('mes_id') }}</span>
                            @endif
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="">Preço <span class="text-danger">*</span></label>
                            <input type="text" name="preco" placeholder="Preço" class="form-control"
                            value="{{ old('preco', $tabela_preco->preco) }}" />
                            @if ($errors->has('preco'))
                                <span class="text-danger">{{ $errors->first('preco') }}</span>
                            @endif
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="">Ano <span class="text-danger">*</span></label>
                            <input type="number" name="ano" placeholder="Ano" class="form-control"
                                value="{{ old('ano', date('Y')) }}" />
                            @if ($errors->has('ano'))
                                <span class="text-danger">{{ $errors->first('ano') }}</span>
                            @endif
                        </div>


                        <div class="col-md-12 options-radios mb-3">
                            <div class="optio-radio">
                                <input type="radio" id="option1" name="option" value="option1">
                                <label for="option1">Opção 1</label>
                            </div>
                           <br>
                            <input type="radio" id="option2" name="option" value="option2">
                            <label for="option2">Opção 2</label><br>
                            <input type="radio" id="option3" name="option" value="option3">
                            <label for="option3">Opção 3</label><br>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
