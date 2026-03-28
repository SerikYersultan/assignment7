<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Смотреть список могут все авторизованные
    }

    public function view(User $user, Article $article): bool
    {
        return true; // Смотреть конкретную статью могут все
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin'; // Создавать может только админ
    }

    public function update(User $user, Article $article): bool
    {
        return $user->role === 'admin'; // Редактировать может только админ
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->role === 'admin'; // Удалять может только админ
    }

    public function restore(User $user, Article $article): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Article $article): bool
    {
        return $user->role === 'admin';
    }
}