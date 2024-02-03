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
                <form method="POST" action="/users">
                    @method('POST')
                    @csrf
                    
                    <div class="row">
                        @include('include.message')

                        <div class="col-md-5 mb-3">
                            <label for="">Nome Completo <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Nome Completo" class="form-control"
                                value="{{ old('name', null) }}" />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Nome de Usuário <span class="text-danger">*</span></label>
                            <input type="text" name="username" placeholder="Nome de Usuário" class="form-control"
                                value="{{ old('username', null) }}" />
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="">Nível de Acesso <span class="text-danger">*</span></label>
                            <select name="nivel_acesso" class="form-control">
                                <option value="" hidden>Nível de Acesso</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                            @if ($errors->has('nivel_acesso'))
                                <span class="text-danger">{{ $errors->first('nivel_acesso') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Palavra-Passe <span class="text-danger">*</span></label>
                            <input type="password" name="password" placeholder="Palavra-Passe" class="form-control"
                                value="{{ old('password', null) }}" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Confirmar Palavra-Passe <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" placeholder="Palavra-Passe"
                                class="form-control" value="{{ old('password_confirmation', null) }}" />
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
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
