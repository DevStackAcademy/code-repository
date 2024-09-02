<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Snippet;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_many_snippets(): void
    {
        $user = User::factory()->create();

        $snippet = Snippet::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Collection::class, $user->snippets);
        $this->assertTrue($user->snippets->contains($snippet));
        $this->assertEquals(1, $user->snippets->count());
    }
}
