<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciador de café da firma</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-light text-dark">
    <div class="container py-5">
        <h1 class="mb-4 text-center">☕ Gerenciador de café da firma</h1>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Compras de Café</h5>
                        <p class="card-text mb-1">Acompanhe quem comprou café e quando.</p>
                        <a href="{{ route('coffee.purchases.index') }}" class="btn btn-primary">Visualizar Compras</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Consumo de Café</h5>
                        <p class="card-text mb-1">Veja quem bebeu café recentemente.</p>
                        <a href="{{ route('coffee.consumptions.index') }}" class="btn btn-success">Visualizar
                            Consumos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Preparação do Café</h5>
                        <p class="card-text mb-1">Saiba quem preparou o café a cada dia.</p>
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
</body>

</html>
