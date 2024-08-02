<?php

use App\Http\Controllers\SnippetController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'snippets.create')->name('home');
Route::post('/', [SnippetController::class, 'store'])->name('snippets.store');
Route::post('{snippet}/fork', [SnippetController::class, 'fork'])->name('snippets.fork');
Route::get('{snippet}', [SnippetController::class, 'edit'])->name('snippets.edit');
Route::put('{snippet}', [SnippetController::class, 'update'])->name('snippets.update');