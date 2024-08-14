<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Snippet;
use Tests\TestCase;

class SnippetTest extends TestCase
{
    use RefreshDatabase;

    public function test_fork_belongs_to_parent(): void
    {
        $parent = Snippet::factory()->create();
        $fork = Snippet::factory()->create([
            'parent_id' => $parent->id,
        ]);

        $this->assertInstanceOf(Snippet::class, $fork->parent);
        $this->assertEquals($parent->id, $fork->parent->id);
    }

    public function test_snippet_has_many_forks(): void
    {
        $snippet = Snippet::factory()->create();
        $fork = Snippet::factory()->create([
            'parent_id' => $snippet->id,
        ]);

        $this->assertInstanceOf(Collection::class, $snippet->forks);
        $this->assertTrue($snippet->forks->contains($fork));
        $this->assertEquals(1, $snippet->forks->count());
    }

    public function test_create_a_fork(): void
    {
        $snippet = Snippet::factory()->create();
        $fork = Snippet::createFork($snippet);

        $this->assertInstanceOf(Snippet::class, $fork);
        $this->assertEquals($snippet->id, $fork->parent_id);

        $this->assertDatabaseHas('snippets', [
            'id' => $fork->id,
            'parent_id' => $snippet->id,
        ]);
    }

    public function test_it_has_all_fields(): void
    {
        $snippet = Snippet::factory()->create();

        $this->assertDatabaseHas('snippets', [
            'id' => $snippet->id,
            'parent_id' => $snippet->parent_id,
            'title' => $snippet->title,
            'code' => $snippet->code,            
        ]);
    }
}
