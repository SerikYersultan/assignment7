<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article $article): bool
    {
        if ($user->role === 'moderator') {
            return true;
        }
        return $user->id === $article->user_id;
    }

    public function create(User $user): bool
    {
        return $user->role === 'user';
    }

    public function update(User $user, Article $article): bool
    {
        if ($user->role === 'moderator') {
            return true;
        }
        return $user->role === 'user' && $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article): bool
    {
        if ($user->role === 'moderator') {
            return true;
        }
        return $user->role === 'user' && $user->id === $article->user_id;
    }

    public function restore(User $user, Article $article): bool
    {
        return $user->role === 'moderator';
    }

    public function forceDelete(User $user, Article $article): bool
    {
        return $user->role === 'moderator';
    }
}