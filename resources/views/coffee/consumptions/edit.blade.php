@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Registrar consumo de café</h2>

        <form method="POST" action="{{ route('coffee.consumptions.update', $consumption) }}">
            @csrf
            @method('PUT')
            @include('coffee.consumptions.partials.form')
        </form>
    </div>
@endsection
