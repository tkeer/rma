<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::prefix('admin')->as("admin.")->group(function () {
    Route::resource('pdfs', Admin\Api\PdfController::class);
    Route::resource('snippets', Admin\Api\HtmlSnippetController::class);
    Route::resource('links', Admin\Api\LinkController::class);
});
