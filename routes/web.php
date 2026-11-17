<?php

use Illuminate\Support\Facades\Route;

// Redirecionamento da rota inicial para a rota de equipamentos
Route::redirect('/', '/equipamentos');

// Etapa de Rotas: Importe o EquipamentoController e registre a rota resource 'equipamentos'

use App\Http\Controllers\EquipamentoController;
Route::resource('equipamentos', EquipamentoController::class);