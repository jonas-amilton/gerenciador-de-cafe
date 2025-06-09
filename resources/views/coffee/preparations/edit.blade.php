@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Editar registro de Preparação de café</h2>

        <form method="POST" action="{{ route('coffee.preparations.update', $preparation) }}">
            @csrf
            @method('PUT')
            @include('coffee.preparations.partials.form')
        </form>
    </div>
@endsection
