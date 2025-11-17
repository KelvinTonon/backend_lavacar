<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Lavacar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar (barra de navegação) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Lavacar</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('empresas.index') }}" class="nav-link">Empresas</a></li>
                    <li class="nav-item"><a href="{{ route('servicos.index') }}" class="nav-link">Serviços</a></li>
                    <li class="nav-item"><a href="{{ route('agendamentos.index') }}" class="nav-link">Agendamentos</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-danger ms-2">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteúdo principal --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Scripts do Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
