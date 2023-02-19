<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Step;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //レシピ投稿を取得
    //'SELECT * FROM users WHERE active = ?'
    public function view() {
        
        return view('recipe/view', compact('steps', 'ingredients')); 
    }

    //レシピの投稿を作成する
    public function create() {
        return view('');
    }

    //作成したレシピを保存する
    public function store(Request $request) {
        $incomingFields = $request->validate([
            'cover_photo_path' => 'required',
            'title' => 'required',
            'catchcopy' => 'required',
            'person' => 'Required',
            'tip' => 'Required'
        ]);

        $incomingFields['cover_photo_path'] = strip_tags($incomingFields['cover_photo_path']);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['catchcopy'] = strip_tags($incomingFields['catchcopy']);
        $incomingFields['person'] = strip_tags($incomingFields['person']);
        $incomingFields['tip'] = strip_tags($incomingFields['tip']);
        $incomingFields['user_id'] = auth()->id();

        Recipe::create($incomingFields);

        return view('');
    }

    //作成したレシピを表示させる
    public function recipeShow() {
        return view('');
    }

    //レシピの投稿を編集する
    public function recipeEdit() {

    }

    //レシピの投稿を更新する
    public function recipeUpdate() {
        return view('');
    }

    public function recipeDestroy(Request $request) {
        $posts = $request->all();
        //論理削除を実装する
        Recipe::where('id', $posts['recipe_id'])->update(['deleted_at' => date("Y-m-d H:i:s", time())]);
        return redirect( route('dashboard'));
        //レシピ削除のルートをまだ確定できなくて、しばらくdashboardに戻ろうと考える。
    }
}
