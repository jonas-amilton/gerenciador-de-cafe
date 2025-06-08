@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Editar Compra de Café</h2>

        <form method="POST" action="{{ route('coffee.purchases.update', $purchase) }}">
            @csrf
            @method('PUT')
            @include('coffee.purchases.partials.form')
        </form>
    </div>
@endsection
