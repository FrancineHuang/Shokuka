<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Support\Facades\Log;


class FollowController extends Controller
{
    public function follow($user_id) {
        Log::info('Follow method called');
        $user = User::find(auth()->id());
        Log::info('Authenticated User: ' . $user->id);
    
        //ユーザーが、自分のアカウントをフォローできません
        if($user->id == $user_id) {
            Log::info('Attempting to follow self');
            return back(); //->with('failure', 'あなたは自分のアカウントをフォローできません');
        }
    
        //ユーザーが、別のユーザーの同一アカウントを重複フォローすることができません
        $existCheck = Follower::where([['followee_id', '=', $user_id], ['follower_id', '=', $user->id]])->count();
    
        if ($existCheck) {
            Log::info('Already following this user');
            return back(); //->with('failure', 'あなたはすでにこのユーザーをフォローしました');
        }
    
        Log::info('Attempting to follow user');
        $follow = new Follower;
        $follow->followee_id = $user_id;
        $follow->follower_id = $user->id;
        $follow->save();
    
        Log::info('Follow relationship created');
    
        return redirect()->back();
    }

    public function unfollow($user_id) {
        $user = User::find(auth()->id());
        Follower::where([['followee_id', '=', $user_id],['follower_id', '=', $user->id]])->delete(); // Swap followee_id and follower_id
        return back();
    }
}
