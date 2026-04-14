<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Быстрый роут для получения токена (используем уже существующего юзера)
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
    $token = $user->createToken('api-token')->plainTextToken;
    return response()->json(['token' => $token]);
});

// Защищенные роуты
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    
    Route::get('/products/{id}/categories', [CategoryController::class, 'getCategoriesByProduct']);
});
Route::post('/fast-register', function () {
    $user = \App\Models\User::factory()->create();
    return response()->json(['token' => $user->createToken('token')->plainTextToken]);
});