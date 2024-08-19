<?php

namespace App\View\Composers;

use App\Models\Snippet;
use Illuminate\View\View;

class SnippetComposer
{
    public function compose(View $view): void
    {
        $snippets = Snippet::latest()->take(12)->get();

        $view->with('snippets', $snippets);
    }
}