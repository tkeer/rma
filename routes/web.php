<?php

use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::prefix('admin')->group(function () {
    Route::get('/', [Admin\HomeController::class, 'index']);
});

Route::get('/', [ResourceController::class, 'getPdfs'])->name('pdfs');
Route::get('/snippets', [ResourceController::class, 'getSnippets'])->name('snippets');
Route::get('/links', [ResourceController::class, 'getLinks'])->name('links');
Route::get('/download/{pdf}', [ResourceController::class, 'downloadPdf'])->name('downloadPdf');