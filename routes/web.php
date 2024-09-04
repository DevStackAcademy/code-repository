<?php

use App\Http\Controllers\GithubAuthenticatorController;
use App\Http\Controllers\SnippetController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/', 'snippets.create')->name('home');

    Route::view('login', 'auth.login')->name('login');
    
    Route::get('{snippet}', [SnippetController::class, 'show'])->name('snippets.show');
    Route::get('{snippet}/edit', [SnippetController::class, 'edit'])->name('snippets.edit');
    
    Route::get('auth/github/redirect', [GithubAuthenticatorController::class, 'redirect'])->name('auth.github');
    Route::get('auth/github/callback', [GithubAuthenticatorController::class, 'callback'])->name('auth.github.callback');
});

Route::middleware('auth')->group(function () {
    Route::post('/', [SnippetController::class, 'store'])->name('snippets.store');
    Route::post('{snippet}/fork', [SnippetController::class, 'fork'])->name('snippets.fork');
    Route::put('{snippet}', [SnippetController::class, 'update'])->name('snippets.update');
});
