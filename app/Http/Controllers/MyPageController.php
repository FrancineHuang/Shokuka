<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Like;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function show() {
        $user_id = Auth::id();
        $showUserData = User::with('recipes')->find($user_id);
        $showRecipeData = $showUserData->recipes;
        $likedRecipes = $showUserData->likes()->with('recipe')->get();

        // ユーザーがフォローしている人の数を取得
        $followingCount = Follower::where('follower_id', $user_id)->count(); 
        // そのユーザーをフォローしている人の数を取得
        $followerCount = Follower::where('followee_id', $user_id)->count();
    
        return view('dashboard', compact('showUserData', 'showRecipeData', 'likedRecipes', 'followingCount', 'followerCount'));
    }

    public function showFollowers() {
        $user_id = Auth::id();
        $showUserData = User::with('recipes')->find($user_id);
        $showRecipeData = $showUserData->recipes;
        $likedRecipes = $showUserData->likes()->with('recipe')->get();

        // ユーザーがフォローしている人の数を取得
        $followingCount = Follower::where('follower_id', $user_id)->count(); 
        // そのユーザーをフォローしている人の数を取得
        $followerCount = Follower::where('followee_id', $user_id)->count();
    
        return view('user.all_recipes', compact('showUserData', 'showRecipeData', 'likedRecipes', 'followingCount', 'followerCount'));
    }
}
