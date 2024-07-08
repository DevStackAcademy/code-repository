<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class HomeViewTest extends TestCase
{
    public function test_it_displays_snippets_create_view(): void
    {
        $this
            ->get(route('home'))
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs('snippets.create');
    }
}
