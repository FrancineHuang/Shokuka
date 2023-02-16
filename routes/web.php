<?php

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
 * レシピのルート
 */

//レシピの一覧
Route::get('/recipe-index', [RecipeController::class, 'recipeIndex']);
//レシピの作成
Route::get('/recipe-create', [RecipeController::class, 'create']);
Route::post('/recipe-create', [RecipeController::class, 'store']);
//レシピの編集
Route::get('/recipe-edit', [RecipeController::class, 'edit']);
//レシピの更新
Route::get('/update-recipe', [RecipeController::class, 'update']);
//レシピの削除
Route::get('/destroy-recipe', [RecipeController::class], 'destroy');



require __DIR__.'/auth.php';
