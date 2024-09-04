<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Response;
use Tests\TestCase;

class GithubAuthenticatorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_redirects_to_github()
    {
        $this
            ->get(route('auth.github'))
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function test_it_authenticates_user_with_github_and_creates_new_user_if_not_exists()
    {
        Socialite::shouldReceive('driver->user')->andReturn(
            (object) [
                'id' => 'github-id-example',
                'name' => 'User test',
                'email' => 'i@test.com',
            ]);

        $this
            ->get(route('auth.github.callback'))
            ->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('users', [
            'name' => 'User test',
            'email' => 'i@test.com',
        ]);

        $this->assertAuthenticated();
    }

    public function test_it_authenticates_existing_user_with_github()
    {
        $user = User::factory()->create([
            'email' => 'i@test.com',
            'github_id' => 'github-id-example',
        ]);

        Socialite::shouldReceive('driver->user')->andReturn(
            (object) [
                'id' => 'github-id-example',
                'name' => 'User test',
                'email' => 'i@test.com',
            ]);

        $this
            ->get(route('auth.github.callback'))
            ->assertStatus(Response::HTTP_FOUND);

        $this->assertEquals($user->id, auth()->id());
        $this->assertAuthenticated();
    }

    public function test_it_handles_exception()
    {
        Socialite::shouldReceive('driver->user')->andThrow(
            new \Exception
        );

        $this
            ->get(route('auth.github.callback'))
            ->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseCount('users', 0);
        $this->assertGuest();
    }
}
