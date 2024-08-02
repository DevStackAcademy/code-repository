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

    public function test_it_display_edit_form_for_snippet(): void
    {
        $snippet = Snippet::factory()->create();

        $this
            ->get(route('snippets.edit', $snippet))
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs('snippets.edit')
            ->assertViewHas('snippet', $snippet);
    }

    public function test_it_updates_a_snippet(): void
    {
        $snippet = Snippet::factory()->create();

        $this
            ->put(route('snippets.edit', $snippet), [
                'code' => 'update-code',
            ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route('snippets.edit', $snippet));

        $this->assertDatabaseHas('snippets', [
            'id' => $snippet->id,
            'code' => 'update-code',
        ]);
    }

    public function test_it_create_a_fork_of_a_snippet(): void
    {
        $original = Snippet::factory()->create();

        $this
            ->post(route('snippets.fork', $original))
            ->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('snippets', [
            'parent_id' => $original->id,
            'code' => $original->code,
        ]);
    }
}
