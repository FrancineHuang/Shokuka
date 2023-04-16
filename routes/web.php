<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use Psy\Command\EditCommand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
 * レシピのルート -> Route::prefix('recipe')->group()でルートをグループ化
 */

Route::prefix('recipe')->group(function () {
    Route::get('/show/{recipe_id}', [RecipeController::class, 'showRecipe'])->name('recipe.show'); //レシピ投稿の表示ルート(GET)
    Route::get('/create', [RecipeController::class, 'createNewRecipe'])->name('recipe.create'); //レシピの作成ルート(GET)
    Route::post('/store', [RecipeController::class, 'storeNewRecipe'])->name('recipe.store'); //レシピの保存機能(POST)
    Route::get('/edit/{recipe_id}', [RecipeController::class, 'editRecipe'])->name('recipe.edit'); //レシピの編集ルート（GET）
    Route::put('/update/{recipe_id}', [RecipeController::class, 'updateRecipe'])->name('recipe.update');//レシピの更新ルート(POST)
    Route::post('/destroy/{recipe_id}', [RecipeController::class, 'destroyRecipe'])->name('recipe.destroy'); //レシピの削除機能
    Route::get('/search', [RecipeController::class, 'searchRecipe'])->name('recipe.search');
});

/*
 * コメントのルート
 */
Route::prefix('recipe/comment')->group(function() {
    Route::post('/store/{recipe_id}', [CommentController::class, 'storeNewComment'])->name('comment.store');
    Route::post('/destroy/{recipe_id}/{id}', [CommentController::class, 'destroyComment'])->name('comment.destroy');
}
);

Route::get('/vue', function () {
    return view('vuetest');
});


require __DIR__.'/auth.php';
