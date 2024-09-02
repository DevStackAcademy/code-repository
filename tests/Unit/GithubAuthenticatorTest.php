<?php

namespace Tests\Unit;

use App\Services\GithubAuthenticator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class GithubAuthenticatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_redirects_to_github(): void
    {
        Socialite::shouldReceive('driver->redirect')->andReturn(
            new \Illuminate\Http\RedirectResponse('http://github.com')
        );

        $githubAuthenticator = new GithubAuthenticator();
        $response = $githubAuthenticator->redirectToProvider();

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('http://github.com', $response->getTargetUrl());
    }

    public function test_handle_callback_successful(): void
    {
        Socialite::shouldReceive('driver->user')->andReturn(
            (object) [
                'id' => 'github-id-example',
                'name' => 'User test',
                'email' => 'i@test.com',
            ]);

        $githubAuthenticator = new GithubAuthenticator();
        $response = $githubAuthenticator->handleCallback();

        $this->assertEquals(Response::HTTP_FOUND, $response->getStatusCode());
        $this->assertDatabaseHas('users', [
            'name' => 'User test',
            'email' => 'i@test.com',
        ]);
        $this->assertAuthenticated();
    }

    public function test_handle_callback_user_already_exists(): void
    {
        $user = \App\Models\User::factory()->create([
            'github_id' => 'github-id-example',
        ]);

        Socialite::shouldReceive('driver->user')->andReturn(
            (object) [
                'id' => 'github-id-example',
                'name' => $user->name,
                'email' => $user->email,
            ]);

        $githubAuthenticator = new GithubAuthenticator();
        $response = $githubAuthenticator->handleCallback();

        $this->assertEquals(Response::HTTP_FOUND, $response->getStatusCode());
        $this->assertDatabaseCount('users', 1);
        $this->assertAuthenticated();
    }

    public function test_handle_callback_error(): void
    {
        Socialite::shouldReceive('driver->user')->andThrow(new \Exception);

        $githubAuthenticator = new GithubAuthenticator();
        $response = $githubAuthenticator->handleCallback();

        $this->assertEquals(Response::HTTP_FOUND, $response->getStatusCode());
        $this->assertDatabaseCount('users', 0);
        $this->assertGuest();
    }
}