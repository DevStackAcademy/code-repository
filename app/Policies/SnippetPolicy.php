<?php

namespace App\Policies;

use App\Models\Snippet;
use App\Models\User;

class SnippetPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Snippet $snippet): bool
    {
        return $user->id === $snippet->user_id;
    }
}
