<?php

namespace App\Http\Controllers;

use App\Services\GithubAuthenticator;

class GithubAuthenticatorController extends Controller
{
    public function redirect(GithubAuthenticator $githubAuthenticator)
    {
        return $githubAuthenticator->redirectToProvider();
    }

    public function callback(GithubAuthenticator $githubAuthenticator)
    {
        return $githubAuthenticator->handleProviderCallback();
    }
}
