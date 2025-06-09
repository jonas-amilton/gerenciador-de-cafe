@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Registrar Preparação de café</h2>

        <form method="POST" action="{{ route('coffee.preparations.store') }}">
            @csrf
            @include('coffee.preparations.partials.form')
        </form>
    </div>
@endsection
