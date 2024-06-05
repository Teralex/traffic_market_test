<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('articles')->group(function () {
    Route::put('/changeStatus', [ArticlesController::class, 'changeArticleStatus']);
    Route::get('/', [ArticlesController::class, 'getActiveArticles']);
    Route::get('/{id}',  [ArticlesController::class, 'getArticleById']);
});
