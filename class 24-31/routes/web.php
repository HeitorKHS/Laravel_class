<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

//comando para criar um resorce php artisan make:controller ProdutoController --resource

Route::resource('produtos', ProdutoController::class);