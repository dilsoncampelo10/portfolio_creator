<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/criar/portifolio', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::get('/portifolios', [PortfolioController::class, 'index'])->name('portfolios');
    Route::post('/criar/portifolio',[PortfolioController::class,'store'])->name('portfolio.store');
});
