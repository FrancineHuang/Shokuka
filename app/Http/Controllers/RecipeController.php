<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Step;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //各入力項目またはアップロード項目のリクエスト
        $request->validate([
            //recipesテーブルの関連項目
            'cover_photo_path' => 'required|image|max:5120',
            'title' => 'required',
            'introduction' => 'required', 
            'person' => 'required',
            'tip' => 'required',

            //ingredientsの関連項目（材料・分量）
            //dot notationを使って、ingredientsの入力項目を紐つける。
            'ingredients' => 'required|array',
            'ingredients.*.material' => 'required|string',
            'ingredients.*.quantity' => 'required|string',

            //stepsテーブルの関連項目(作り方)
            //dot notationを使って、stepsの入力項目を紐つける。
            'steps'=>'required|array',
            'steps.*.content' => 'required|string',
            'steps.*.step_photo_path' => 'nullable|image|max:5120'

        ]);
        
        //認証されたユーザーをGET
        $user = User::find(auth()->id());
    
        //レシピのカバー写真を保存する
        $filename = 'cover-' . $user->id . '-' . uniqid() . '.jpg';
        $coverImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
        Storage::put('public/cover_image/' . $filename, $coverImg);
    
        //レシピ(recipes)のデータを受け取る
        $recipe = new Recipe();
        $recipe->cover_photo_path = $filename;
        $recipe->title = strip_tags($request->input('title'));
        $recipe->introduction = strip_tags($request->input('introduction'));
        $recipe->person = strip_tags($request->input('person'));
        $recipe->tip = strip_tags($request->input('tip'));
        $recipe->user_id = $user->id;
        

        //トランザクションでレシピ、材料と作り方ステップを保存する。
        DB::transaction(function () use ($recipe, $request) {
            $recipe->save();

            //材料・分量（ingredients）のデータを受け取る

            //ステップ（steps）のデータを受け取る
        });

    
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
