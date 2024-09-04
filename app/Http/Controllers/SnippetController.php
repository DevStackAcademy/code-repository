<?php

namespace App\Http\Controllers;

use App\Http\Requests\SnippetRequest;
use App\Models\Snippet;

class SnippetController extends Controller
{
    public function store(SnippetRequest $request): \Illuminate\Http\RedirectResponse
    {
        $snippet = $request->user()->snippets()->create($request->validated());

        return redirect()->route('snippets.edit', $snippet);
    }

    public function show(Snippet $snippet): \Illuminate\View\View
    {
        return view('snippets.show', compact('snippet'));
    }

    public function edit(Snippet $snippet): \Illuminate\View\View
    {
        return view('snippets.edit', compact('snippet'));
    }

    public function update(SnippetRequest $request, Snippet $snippet): \Illuminate\Http\RedirectResponse
    {
        $snippet->update($request->validated());

        return redirect()->route('snippets.edit', $snippet);
    }

    public function fork(Snippet $snippet): \Illuminate\Http\RedirectResponse
    {
        $fork = Snippet::createFork($snippet);

        return redirect()->route('snippets.edit', $fork);
    }
}
