<?php

namespace App\Http\Controllers;

use App\Http\Requests\SnippetRequest;
use App\Models\Snippet;

class SnippetController extends Controller
{
    public function store(SnippetRequest $request): \Illuminate\Http\RedirectResponse
    {
        $snippet = Snippet::create($request->validated());

        return redirect()->route('snippets.edit', $snippet);
    }
}
