<?php

use App\Http\Controllers\SnippetController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'snippets.create')->name('home');
Route::post('/', [SnippetController::class, 'store'])->name('snippets.store');
Route::get('{snippet}', [SnippetController::class, 'edit'])->name('snippets.edit');