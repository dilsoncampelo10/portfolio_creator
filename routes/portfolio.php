<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/criar/portifolio', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::get('/portifolios', [PortfolioController::class, 'index'])->name('portfolios');
    Route::post('/criar/portifolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::delete('/excluir/portifolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::get('/editar/portifolio/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/editar/portifolio', [PortfolioController::class, 'update'])->name('portfolio.update');

    Route::post('/criar/pagina', [PageController::class, 'store'])->name('page.store');

    Route::post('/save/{page}', [PageController::class, 'save'])->name('save.page');

    Route::get('/preview/{token}/{url}', [PortfolioController::class, 'preview'])->name('portfolio.preview');
});
