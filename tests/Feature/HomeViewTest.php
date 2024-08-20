<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_snippets_create_view(): void
    {
        $this
            ->get(route('home'))
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs('snippets.create');
    }
}
