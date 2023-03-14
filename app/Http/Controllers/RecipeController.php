<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Step;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            'cover_photo_path' => ['required','image', 'max:5120'],
            'title' => ['required', 'string', 'max:255'],
            'introduction' => ['required', 'string', 'max:255'], 
            'person' => ['required', 'string', 'max:255'],
            'tip' => ['required', 'string', 'max:255'],

            //'ingredients' => ['required', 'array'],
            'ingredients.*.material' => ['required', 'string', 'max:255'],
            'ingredients.*.quantity' => ['required', 'string', 'max:255'],
            
            //'steps' => ['required', 'array'],
            'steps.*.content' => ['required', 'string', 'max:255'],
            'steps.*.step_photo_path' => ['nullable','image','max:5120'],

        ]);


        $user = User::find(auth()->id());

        // Save the recipe details
        $recipe = new Recipe();
        $recipe->title = strip_tags($request->input('title'));
        $recipe->introduction = strip_tags($request->input('introduction'));
        $recipe->person = strip_tags($request->input('person'));
        $recipe->tip = strip_tags($request->input('tip'));
        $recipe->user_id = $user->id;

        // Save the cover photo
        $filename = 'cover-' . $user->id . '-' . uniqid() . '.jpg';
        $coverImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
        Storage::put('public/cover_image/' . $filename, $coverImg);
        $recipe->cover_photo_path = $filename;

        // Save the recipe
        $recipe->save();

        // Save the ingredients
        $ingredient = new Ingredient();
        $ingredient->material = strip_tags($request->input('material'));
        $ingredient->quantity = strip_tags($request->input('quantity'));
        $ingredient->recipe_id = $recipe->id;
        $ingredient->user_id = $user->id;
        $ingredient->save();
        

        // Save the step contents
        $step = new Step();
        $step->content = strip_tags($request->input('content'));
        $step->user_id = $user->id;
        $step->recipe_id = $recipe->id;

        // Save the step photo
        $filename = 'step-' . $user->id . '-' . uniqid() . '.jpg';
        $stepImg = Image::make($request->file('step_photo_path'))->fit(300, 300)->encode('jpg');
        Storage::put('public/step_image/' . $filename, $stepImg);
        $step->step_photo_path = $filename;
        
        // Save the step
        $step->save();


        return response()->json([
            'message' => 'Recipe created successfully.',
            'data' => $recipe
        ], 201);
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
