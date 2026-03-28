<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Разрешаем массовое заполнение этих полей
    protected $fillable = ['user_id', 'title', 'content'];

    // Связь: статья принадлежит одному пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}