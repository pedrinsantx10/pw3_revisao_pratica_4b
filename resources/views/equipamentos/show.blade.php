@extends('layouts.app')

@section('title', 'Detalhes do Equipamento')

@section('content')

    <section class="mx-auto max-w-xl">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h1 class="text-xl font-bold text-slate-900">{{ $equipamento->nome }}</h1>
                    <p class="mt-1 text-sm text-slate-600">Detalhes do equipamento cadastrado no inventário.</p>
                </div>
                <span class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                    #{{ $equipamento->id }}
                </span>
            </div>

            <dl class="mt-6 divide-y divide-slate-100 text-sm">
                <div class="flex justify-between py-3">
                    <dt class="font-medium text-slate-500">Categoria</dt>
                    <dd class="text-slate-900">{{ $equipamento->categoria }}</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="font-medium text-slate-500">Localização</dt>
                    <dd class="text-slate-900">{{ $equipamento->localizacao }}</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="font-medium text-slate-500">Status</dt>
                    <dd class="text-slate-900">{{ $equipamento->status }}</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="font-medium text-slate-500">Data de Cadastro</dt>
                    <dd class="text-slate-900">
                        {{ isset($equipamento->created_at) && is_object($equipamento->created_at) ? $equipamento->created_at->format('d/m/Y H:i') : 'Recente' }}
                    </dd>
                </div>
            </dl>

            <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">
                <a href="{{ route('equipamentos.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                    Voltar para a Listagem
                </a>
                <a href="{{ route('equipamentos.edit', $equipamento) }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">
                    Editar Equipamento
                </a>
            </div>
        </div>
    </section>

@endsection
