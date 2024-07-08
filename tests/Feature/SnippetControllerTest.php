<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use App\Models\Snippet;
use Tests\TestCase;

class SnippetControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_a_snippet(): void
    {
        $this
            ->post('/', [
                'code' => 'class SnippetControllerTest { }',
            ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect('/'.Snippet::first()->id);

        $this->assertDatabaseHas('snippets', [
            'code' => 'class SnippetControllerTest { }',
        ]);
    }
}
