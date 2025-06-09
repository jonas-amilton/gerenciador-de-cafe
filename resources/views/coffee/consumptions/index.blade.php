@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Consumos de café</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('coffee.consumptions.create') }}" class="btn btn-primary mb-3">Registrar consumo</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Consumidor</th>
                    <th>Consumido em</th>
                    <th>{{-- Ações --}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consumptions as $c)
                    <tr>
                        <td>{{ $c->user->name }}</td>
                        <td>{{ $c->getFormatedAttribute($c->consumed_at) }}</td>
                        <td>
                            <a href="{{ route('coffee.consumptions.edit', $c) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('coffee.consumptions.destroy', $c) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $consumptions->links() }}
    </div>
@endsection
