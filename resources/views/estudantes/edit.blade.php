@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
    </div>

        @livewire('estudante-edit-form', ['id'=>$id])
</div>

@endsection
