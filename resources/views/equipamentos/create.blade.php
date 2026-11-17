@extends('layouts.app')

@section('title', 'Cadastrar Novo Equipamento')

@section('content')

    <section class="mx-auto max-w-xl">
        <!-- Cartão do Formulário -->
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <div class="border-b border-slate-100 pb-4">
                <h1 class="text-xl font-bold text-slate-900">Cadastrar Novo Equipamento</h1>
                <p class="mt-1 text-sm text-slate-600">Preencha os campos abaixo para registrar um equipamento no inventário da ETEC.</p>
            </div>

            <!-- Exibição de Erros de Validação -->
            @if ($errors->any())
                <div class="mt-6 rounded-lg border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                    <p class="font-semibold text-rose-800">Verifique os erros listados:</p>
                    <ul class="mt-2 list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulário de Criação (POST /equipamentos) -->
            <form action="{{ route('equipamentos.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label for="nome" class="block text-sm font-medium text-slate-700">Nome do Equipamento</label>
                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        value="{{ old('nome') }}"
                        class="mt-1.5 block w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                        placeholder="Ex: Projetor Epson PowerLite X41"
                    >
                    @error('nome')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="categoria" class="block text-sm font-medium text-slate-700">Categoria</label>
                        <select
                            name="categoria"
                            id="categoria"
                            class="mt-1.5 block w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                        >
                            <option value="">Selecione...</option>
                            @foreach (['Computador', 'Periférico', 'Audiovisual', 'Rede'] as $opcaoCategoria)
                                <option value="{{ $opcaoCategoria }}" {{ old('categoria') === $opcaoCategoria ? 'selected' : '' }}>
                                    {{ $opcaoCategoria }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                        <select
                            name="status"
                            id="status"
                            class="mt-1.5 block w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                        >
                            @foreach (['Disponível', 'Em Uso', 'Manutenção', 'Descarte'] as $opcaoStatus)
                                <option value="{{ $opcaoStatus }}" {{ old('status', 'Disponível') === $opcaoStatus ? 'selected' : '' }}>
                                    {{ $opcaoStatus }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="localizacao" class="block text-sm font-medium text-slate-700">Localização ou Sala</label>
                    <input
                        type="text"
                        name="localizacao"
                        id="localizacao"
                        value="{{ old('localizacao') }}"
                        class="mt-1.5 block w-full rounded-lg border border-slate-300 px-3.5 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                        placeholder="Ex: Laboratório 01"
                    >
                    @error('localizacao')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('equipamentos.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">
                        Cadastrar Equipamento
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
