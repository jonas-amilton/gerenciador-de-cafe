@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Registrar Compra de Café</h2>

        <form method="POST" action="{{ route('coffee.purchases.store') }}">
            @csrf
            @include('coffee.purchases.partials.form')
        </form>
    </div>
@endsection
