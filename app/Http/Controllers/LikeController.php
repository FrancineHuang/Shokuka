<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Like;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request, $recipe_id) {
        $user = User::find(auth()->id());
        $recipe = Recipe::find($recipe_id);

        $like = New Like();
        $like->user_id = $user->id;
        $like->recipe_id = $recipe->id;

        $like->save();
        return redirect()->back();
    }

    public function unlike(Request $request, $recipe_id) {
        $user = User::find(auth()->id());
        $recipe = Recipe::find($recipe_id);
        $like = Like::where('recipe_id', $recipe->id)->where('user_id', $user)->first();
        $like->delete();

        return redirect()->back();
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
    
        return view('user.likes', compact('showUserData', 'showRecipeData', 'likedRecipes', 'followingCount', 'followerCount'));
    }
}
