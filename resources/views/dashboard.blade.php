@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard</h2>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
            <div class="p-6 text-gray-900">
                {{ __('Seja bem vindo!') }}
            </div>
        </div>


        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
            <h3 class="text-lg font-bold mb-4">Resumo do Café ☕</h3>

            <ul class="list-disc pl-6 space-y-2">
                <li><strong>Total comprado:</strong> {{ $totalPurchased }} unidades</li>
                <li><strong>Maior comprador:</strong> {{ $topBuyer?->name ?? '—' }} ({{ $topBuyerTotal }} unidades)</li>
                <li><strong>Último a passar café foi:</strong> {{ $lastBrewedBy?->name ?? '—' }} em
                    {{ $lastBrewedAt?->format('d/m/Y H:i') ?? '—' }}</li>
            </ul>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Compras de Café</h5>
                        <p class="card-text mb-2">Acompanhe quem comprou café e quando.</p>
                        <a href="{{ route('coffee.purchases.index') }}" class="btn btn-primary">Visualizar Compras</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Consumo de Café</h5>
                        <p class="card-text mb-2">Veja quem bebeu café recentemente.</p>
                        <a href="{{ route('coffee.consumptions.index') }}" class="btn btn-success">Visualizar
                            Consumos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Preparação do Café</h5>
                        <p class="card-text mb-2">Saiba quem preparou o café a cada dia.</p>
                        <a href="{{ route('coffee.preparations.index') }}" class="btn btn-warning">Visualizar
                            Preparações</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5 text-center">
            <small>&copy; {{ date('Y') }} Gerenciador de café da firma - Criado com Laravel por Jonas</small>
        </footer>
    </div>
@endsection
