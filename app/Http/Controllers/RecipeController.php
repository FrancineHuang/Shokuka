<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
{
    //レシピ投稿を取得
    //'SELECT * FROM users WHERE active = ?'
    public function search() {
        
    }

    //レシピの投稿を作成する
    public function createNewRecipe() {
        return view('recipe.create');
    }

    //作成したレシピを保存する
    public function storeNewRecipe(Request $request) {

        $recipe = $request->validate([
            'cover_photo_path' => 'required|image',
            'title' => 'required',
            'introduction' => 'required', 
            'person' => 'Required',
            'tip' => 'Required'
        ]);
        
        $user = auth()->user();

        $filename ='cover-'. $user->id . uniqid() . 'jpg'; //ユニークな画像名の付け方：uniqid()でランダムな英数字が出る

        $coverImg = Image::make($request->file('cover_image')->fit(800, 600)->encode('jpg'));
        Storage::put('public/cover_image/' . $filename , $coverImg);

        //$saveImagePath = $request->file('image')->store('recipe', 'public');

        //$recipe->image = $saveImagePath;
        //$recipe->save();
        $recipe['title'] = strip_tags($recipe['title']);
        $recipe['introduction'] = strip_tags($recipe['introduction']);
        $recipe['person'] = strip_tags($recipe['person']);
        $recipe['tip'] = strip_tags($recipe['tip']);
        $recipe['user_id'] = auth()->id();
        

        Recipe::create($recipe);

        return view('recipe.show');
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
