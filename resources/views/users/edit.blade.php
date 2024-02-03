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
                <form method="POST" action="/users/{{ $user->id }}">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        @include('include.message')

                        <div class="col-md-5 mb-3">
                            <label for="">Nome Completo <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Nome Completo" class="form-control"
                                value="{{ old('name', $user->name) }}" />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Nome de Usuário <span class="text-danger">*</span></label>
                            <input type="text" name="username" placeholder="Nome de Usuário" class="form-control"
                                value="{{ old('username', $user->username) }}" />
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="">Nível de Acesso <span class="text-danger">*</span></label>
                            <select name="nivel_acesso" class="form-control">
                                <option value="" hidden>Nível de Acesso</option>
                                <option value="user" {{ $user->nivel_acesso=='user' ? 'selected':null }}>user</option>
                                <option value="admin" {{ $user->nivel_acesso=='admin' ? 'selected':null }}>admin</option>
                            </select>
                            @if ($errors->has('nivel_acesso'))
                                <span class="text-danger">{{ $errors->first('nivel_acesso') }}</span>
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
