@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Compras de café</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('coffee.purchases.create') }}" class="btn btn-primary mb-3">Registrar Compra</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Comprador</th>
                    <th>Data da compra</th>
                    <th>Quantidade de cafés comprados</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $p)
                    <tr>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->purchased_at }}</td>
                        <td>{{ $p->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $purchases->links() }}
    </div>
@endsection
