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

    public function edit(Snippet $snippet): \Illuminate\View\View
    {
        $buttonText = 'Update';

        return view('snippets.edit', compact('snippet', 'buttonText'));
    }

    public function update(SnippetRequest $request, Snippet $snippet): \Illuminate\Http\RedirectResponse
    {
        $snippet->update($request->validated());

        return redirect()->route('snippets.edit', $snippet);
    }
}
