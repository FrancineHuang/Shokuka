<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //ユーザーのプロフィール表示ページ
    public function show($user_id) {
        $showUserData = User::with('recipes')->find($user_id);
        $showRecipeData = $showUserData->recipes;
        $likedRecipes = $showUserData->likes()->with('recipe')->get();

        return view('user.show', compact('showUserData', 'showRecipeData', 'likedRecipes'));
    }

    //ユーザーの全てのレシピの一覧ページ
    public function showAllRecipes($user_id) {
        $showUserData = User::with('recipes')->find($user_id);
        $showRecipeData = $showUserData->recipes;

        return view('user.all_recipes', compact('showUserData', 'showRecipeData'));
    }

    //ユーザーのお気に入りレシピ一覧ページ
    public function showUserLikes($user_id) {
        $showUserData = User::with('recipes')->find($user_id);
        $showRecipeData = $showUserData->recipes;
        $likedRecipes = $showUserData->likes()->with('recipe')->get();

        return view('user.likes', compact('showUserData', 'showRecipeData', 'likedRecipes'));
    }
}