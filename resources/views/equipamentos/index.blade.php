@extends('layouts.app')

@section('title', 'Controle de Equipamentos de TI')

@section('content')

    <!-- Topo da Seção com Título e Botão de Ação -->
    <section class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Controle de Equipamentos de TI</h1>
            <p class="mt-1 text-sm text-slate-600">Gerencie o inventário de equipamentos e periféricos dos laboratórios da ETEC.</p>
        </div>
        <a href="{{ route('equipamentos.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">
            Cadastrar Equipamento
        </a>
    </section>

    <!-- Feedback com Mensagem Flash de Sucesso -->
    @if (session('sucesso'))
        <div class="mt-6 flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <div class="flex items-center gap-2 font-medium">
                <span>{{ session('sucesso') }}</span>
            </div>
        </div>
    @endif

    <!-- Tabela de Registros -->
    <section class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-slate-200 bg-slate-50/50 px-6 py-4">
            <h2 class="font-semibold text-slate-800 text-sm">Equipamentos Cadastrados</h2>
            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">
                Total: {{ count($equipamentos) }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="border-b border-slate-200 bg-slate-50 text-xs font-semibold uppercase text-slate-600">
                    <tr>
                        <th class="px-6 py-3.5">ID</th>
                        <th class="px-6 py-3.5">Nome do Equipamento</th>
                        <th class="px-6 py-3.5">Categoria</th>
                        <th class="px-6 py-3.5">Localização</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5">Cadastro</th>
                        <th class="px-6 py-3.5 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($equipamentos as $equipamento)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-slate-400">#{{ $equipamento->id }}</td>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $equipamento->nome }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $corCategoria = match($equipamento->categoria) {
                                        'Computador' => 'bg-blue-100 text-blue-800',
                                        'Audiovisual' => 'bg-purple-100 text-purple-800',
                                        'Rede' => 'bg-emerald-100 text-emerald-800',
                                        default => 'bg-slate-100 text-slate-700',
                                    };
                                @endphp
                                <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium {{ $corCategoria }}">
                                    {{ $equipamento->categoria }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $equipamento->localizacao }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $corStatus = match($equipamento->status) {
                                        'Disponível' => 'bg-emerald-100 text-emerald-800',
                                        'Em Uso' => 'bg-indigo-100 text-indigo-800',
                                        'Manutenção' => 'bg-amber-100 text-amber-800',
                                        default => 'bg-rose-100 text-rose-800',
                                    };
                                @endphp
                                <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium {{ $corStatus }}">
                                    {{ $equipamento->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                {{ isset($equipamento->created_at) && is_object($equipamento->created_at) ? $equipamento->created_at->format('d/m/Y H:i') : 'Recente' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-3">
                                    <a href="{{ route('equipamentos.edit', $equipamento) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-xs">
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('equipamentos.destroy', $equipamento) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir o equipamento #{{ $equipamento->id }}?');"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600 hover:text-rose-900 font-medium text-xs">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-500">
                                Nenhum equipamento registrado no momento.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

@endsection
