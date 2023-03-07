<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Step;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
{

    //レシピの投稿を作成する
    public function createNewRecipe() {
        return view('recipe.create');
    }

    //作成したレシピを保存する
    public function storeNewRecipe(Request $request) {
        $request->validate([
            'cover_photo_path' => 'required|image|max:5120',
            'title' => 'required',
            'introduction' => 'required', 
            'person' => 'required',
            'tip' => 'required'
        ]);
    
        $user = User::find(auth()->id());
    
        $filename = 'cover-' . $user->id . '-' . uniqid() . '.jpg';
        $coverImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
        Storage::put('public/cover_image/' . $filename, $coverImg);
    
        $recipe = new Recipe();
        $recipe->cover_photo_path = $filename;
        $recipe->title = strip_tags($request->input('title'));
        $recipe->introduction = strip_tags($request->input('introduction'));
        $recipe->person = strip_tags($request->input('person'));
        $recipe->tip = strip_tags($request->input('tip'));
        $recipe->user_id = $user->id;
        $recipe->save();
    
        return 'You did it';
    }

    //作成したレシピを表示させる
    public function show() {
        if(!auth()->check()) {
            return redirect('/');
        }
        return view('recipe.show'); 
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
