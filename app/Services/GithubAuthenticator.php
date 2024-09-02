<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GithubAuthenticator
{
    /**
     * Redirect to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider(): \Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Handle the callback from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCallback(): \Illuminate\Http\RedirectResponse
    {
        try {
            $github = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }

        $user = $this->findOrCreateUser($github);

        $this->authenticate($user);

        return redirect()->route('home');
    }

    /**
     * Find or create a user based on the GitHub response.
     *
     * @param object $github
     * @return \App\Models\User
     */
    protected function findOrCreateUser(object $github): User
    {
        return User::updateOrCreate(
            ['github_id' => $github->id],
            [
                'name' => $github->name,
                'email' => $github->email,
                'github_id' => $github->id,
            ]
        );
    }

    /**
     * Authenticate the user.
     *
     * @param \App\Models\User $user
     * @return void
     */
    protected function authenticate(User $user): void
    {
        Auth::login($user);
    }
}