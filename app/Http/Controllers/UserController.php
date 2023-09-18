<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //ユーザーのプロフィール表示ページ
    public function show($user_id) {
        $showUserData = User::with('recipes')->find($user_id);
        $showRecipeData = $showUserData->recipes;
        $likedRecipes = $showUserData->likes()->with('recipe')->get();
    
        //ユーザーがフォローしているかをチェック
        $currentlyFollowing = false;
        if (Auth::check()) {
            $authenticatedUser = auth()->user();
            $currentlyFollowing = $authenticatedUser->followees->contains($showUserData->id);
            Log::info('Currently Following: ' . ($currentlyFollowing ? 'true' : 'false'));
        }

        // ユーザーがフォローしている人の数を取得
        $followingCount = Follower::where('follower_id', $user_id)->count(); 
        // そのユーザーをフォローしている人の数を取得
        $followerCount = Follower::where('followee_id', $user_id)->count();
    
        return view('user.show', compact('showUserData', 'showRecipeData', 'likedRecipes', 'currentlyFollowing', 'followingCount', 'followerCount'));
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