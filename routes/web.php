<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/print-my-file', [PageController::class, 'printFile'])->name('print-file');
Route::get('/design-and-print', [PageController::class, 'quote'])->name('design-print');
Route::get('/small-batch-printing', [PageController::class, 'smallBatch'])->name('small-batch');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'quote'])->name('contact');
Route::get('/request-a-quote', [PageController::class, 'quote'])->name('quote');
Route::post('/request-a-quote', [QuoteRequestController::class, 'store'])->name('quote.store');
Route::get('/request-a-quote/success/{quoteRequest}', [QuoteRequestController::class, 'success'])->name('quote.success');

Route::get('/admin/quote-request-files/{file}/download', [QuoteRequestController::class, 'downloadFile'])
    ->middleware('auth')
    ->name('admin.quote-files.download');
