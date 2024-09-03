<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class GithubAuthenticatorControllerTest extends TestCase
{
    public function test_it_redirects_to_github()
    {
        $this->withoutExceptionHandling();
        $this
            ->get(route('auth.github'))
            ->assertStatus(Response::HTTP_FOUND);
    }
}
