<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\RecipeStep;
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

    private $recipe;
    private $step;
    private $ingredient;

    public function __construct() {
        $this->recipe = new Recipe();
        $this->step = new Step();
        $this->ingredient = new Ingredient();

    }

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

        // レシピの文字データを保存する
        $recipe = new Recipe();
        $recipe->title = strip_tags($request->input('title'));
        $recipe->introduction = strip_tags($request->input('introduction'));
        $recipe->person = strip_tags($request->input('person'));
        $recipe->tip = strip_tags($request->input('tip'));
        $recipe->user_id = $user->id;

        // レシピのカバー写真を保存する
        $filename = 'cover-' . $user->id . '-' . uniqid() . '.jpg';
        $coverImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
        Storage::put('public/cover_image/' . $filename, $coverImg);
        $recipe->cover_photo_path = $filename;

        // レシピを保存
        $recipe->save();

        // Ingredient(材料)を保存する
        $ingredient = new Ingredient();
        $ingredient->material = strip_tags($request->input('material'));
        $ingredient->quantity = strip_tags($request->input('quantity'));
        $ingredient->recipe_id = $recipe->id;
        $ingredient->user_id = $user->id;
        $ingredient->save();
        

        // Step（作り方ステップ）の内容を保存する
        $step = new Step();
        $step->content = strip_tags($request->input('content'));
        $step->user_id = $user->id;
        $step->recipe_id = $recipe->id;

        // Step（作り方ステップ）の写真を保存する
        $filename = 'step-' . $user->id . '-' . uniqid() . '.jpg';
        $stepImg = Image::make($request->file('step_photo_path'))->fit(300, 300)->encode('jpg');
        Storage::put('public/step_image/' . $filename, $stepImg);
        $step->step_photo_path = $filename;
        
        // Step（作り方ステップ）を保存する
        $step->save();

        // recipe_step→中間テーブルの紐つけ
        $recipe_step = new RecipeStep();
        $recipe_step->recipe_id = $recipe->id;
        $recipe_step->step_id = $step->id;
        $recipe_step->timestamps = false;
        $recipe_step->save();

        // recipe_ingredient→中間テーブルの紐つけ
        $recipe_ingredient = new RecipeIngredient();
        $recipe_ingredient->recipe_id = $recipe->id;
        $recipe_ingredient->ingredient_id = $ingredient->id;
        $recipe_ingredient->timestamps = false;
        $recipe_ingredient->save();

        return response()->json([
            'message' => 'Recipe created successfully.',
            'data' => $recipe
        ], 201);
    }

    //レシピを表示させる
    public function showRecipe($recipe_id) {
        $showRecipeData = $this->recipe->fetchRecipeData($recipe_id);
        $showIngredientData = $this->ingredient
            ->leftJoin('recipe_ingredients', 'ingredients.id', '=', 'recipe_ingredients.ingredient_id')
            ->where('recipe_ingredients.recipe_id', '=', $recipe_id)
            ->get();
        $showStepData = $this->step
            ->leftJoin('recipe_steps', 'steps.id', '=', 'recipe_steps.step_id')
            ->where('recipe_steps.recipe_id', '=', $recipe_id)
            ->get();
            return view('recipe.show', compact('showRecipeData', 'showIngredientData', 'showStepData'));
    }
    


    //レシピの投稿を編集する
    public function editRecipe($recipe_id) {
        $editRecipeData = $this->recipe->fetchRecipeData($recipe_id);
        $editIngredientData = $this->ingredient
            ->leftJoin('recipe_ingredients', 'ingredients.id', '=', 'recipe_ingredients.ingredient_id')
            ->where('recipe_ingredients.recipe_id', '=', $recipe_id)
            ->get();
        $editStepData = $this->step
            ->leftJoin('recipe_steps', 'steps.id', '=', 'recipe_steps.step_id')
            ->where('recipe_steps.recipe_id', '=', $recipe_id)
            ->get();
            return view('recipe.edit', compact('editRecipeData', 'editIngredientData', 'editStepData'));
    }
    
    

    //レシピの投稿を更新する
    public function updateRecipe(Request $request, $recipe_id, $id) {
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
        
        $recipe = Recipe::findOrFail($recipe_id);
        $step = Step::find($recipe_id);
        $ingredient = Ingredient::find($recipe_id);
        $user = User::find(auth()->id());
    
        // レシピの内容（文字）を更新する
        $recipe->title = strip_tags($request->input('title'));
        $recipe->introduction = strip_tags($request->input('introduction'));
        $recipe->person = strip_tags($request->input('person'));
        $recipe->tip = strip_tags($request->input('tip'));
    
        // もしカバー写真を変更すれば、更新する
        if ($request->hasFile('cover_photo_path')) {
            // 古い写真を削除する
            Storage::delete('public/cover_image/' . $recipe->cover_photo_path);
            // 新しい写真を保存する
            $filename = 'cover-' . $user->id . '-' . uniqid() . '.jpg';
            $coverImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
            Storage::put('public/cover_image/' . $filename, $coverImg);
            $recipe->cover_photo_path = $filename;
        }
    
        // レシピのデータを更新する
        $recipe->save();
    
        // 材料・分量のデータを更新する
        if ($request->has('ingredients')) {
            foreach ($request->input('ingredients') as $ingredient) {
                $newIngredient = Ingredient::findOrFail($ingredient['id']);
                $newIngredient->material = strip_tags($ingredient['material']);
                $newIngredient->quantity = strip_tags($ingredient['quantity']);
                $newIngredient->save();
            }
        }
    
        // 作り方ステップの内容を更新する
        if ($request->has('steps')) {
            foreach ($request->input('steps') as $step) {
                $newStep = Step::findOrFail($step['id']);
                $newStep->content = strip_tags($step['content']);
    
                // もしステップ写真を変更すれば、更新する
                if ($stepPhoto = $step['step_photo_path']) {
                    // 古い写真を削除する
                    Storage::delete('public/step_image/' . $newStep->step_photo_path);
                    // 新しい写真を保存する
                    $filename = 'step-' . $user->id . '-' . uniqid() . '.jpg';
                    $stepImg = Image::make($stepPhoto)->fit(800, 600)->encode('jpg');
                    Storage::put('public/step_image/' . $filename, $stepImg);
                    $newStep->step_photo_path = $filename;
                }
                
                $newStep->save();
            }
        }
    
        return redirect()->route('recipe.show', ['recipe_id' => $recipe_id])->with('message', 'レシピが更新されました！');
    }
    

    public function destroyRecipe(Request $request) {
        $recipe = $request->all();
        //論理削除を実装する
        Recipe::where('id', $recipe['recipe_id'])->update(['deleted_at' => date("Y-m-d H:i:s", time())]);
        return redirect( route('dashboard'));
        //レシピ削除のルートをまだ確定できなくて、しばらくdashboardに戻ろうと考える。
    }
}
