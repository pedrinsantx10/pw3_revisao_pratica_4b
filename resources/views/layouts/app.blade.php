<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventário de Equipamentos') | PW3 ETEC</title>
    <!-- Tailwind CSS Carregado Offline -->
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
</head>
<body class="flex min-h-full flex-col text-slate-800 antialiased">

    <!-- Cabeçalho Principal -->
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <div class="flex items-center gap-3">
                <a href="{{ route('equipamentos.index') }}" class="flex items-center gap-2 font-black tracking-tight text-slate-900 text-lg">
                    <span class="rounded-lg bg-indigo-600 px-2.5 py-1 text-xs text-white uppercase font-mono">Inventário</span>
                    <span>Equipamentos ETEC</span>
                </a>
            </div>
            <nav class="flex items-center gap-4 text-sm font-medium">
                <a href="{{ route('equipamentos.index') }}" class="text-slate-600 hover:text-slate-900 transition-colors">Equipamentos</a>
                <a href="{{ route('equipamentos.create') }}" class="rounded-lg bg-indigo-600 px-3.5 py-1.5 text-xs font-semibold text-white hover:bg-indigo-700 transition-colors">
                    Novo Equipamento
                </a>
            </nav>
        </div>
    </header>

    <!-- Conteúdo Dinâmico -->
    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="border-t border-slate-200 bg-white py-6 text-center text-xs text-slate-500">
        <div class="mx-auto max-w-6xl px-4 sm:px-6">
            <p>© {{ date('Y') }} ETEC | Revisão Prática de Programação Web III (4º Bimestre)</p>
        </div>
    </footer>

</body>
</html>
