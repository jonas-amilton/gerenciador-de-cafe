@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Preparações de café</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('coffee.preparations.create') }}" class="btn btn-primary mb-3">Registrar Preparação</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Quem preparou?</th>
                    <th>Preparado em</th>
                    <th>Rendeu quantas xicaras? (unidades)</th>
                    <th>{{-- Ações --}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preparations as $p)
                    <tr>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->getFormatedPreparedAt() }}</td>
                        <td>{{ $p->cups_estimated }}</td>
                        <td>
                            <a href="{{ route('coffee.preparations.edit', $p) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('coffee.preparations.destroy', $p) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir esta preparação?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $preparations->links() }}
    </div>
@endsection
