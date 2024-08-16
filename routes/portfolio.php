<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/criar/portifolio', [PortfolioController::class, 'create'])->name('portifolio.create');
});
