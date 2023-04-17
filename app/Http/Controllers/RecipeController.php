<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\RecipeStep;
use App\Models\Step;
use App\Models\Comment;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class RecipeController extends Controller
{

    private $recipe;
    private $step;
    private $ingredient;
    protected $comment;

    public function __construct(Comment $comment) {
        $this->recipe = new Recipe();
        $this->step = new Step();
        $this->ingredient = new Ingredient();
        $this->comment = $comment;

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
    public function showRecipe($recipe_id)
    {
        $showRecipeData = Recipe::with('user', 'ingredients', 'steps', 'comments')->find($recipe_id);
        $showUserData = $showRecipeData->user;
        $showIngredientData = $showRecipeData->ingredients;
        $showStepData = $showRecipeData->steps;
        $showCommentData = $showRecipeData->comments;

        return view('recipe.show', compact('showRecipeData', 'showUserData', 'showIngredientData', 'showStepData', 'showCommentData'));

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
    public function updateRecipe(Request $request, $id) {
        $request->validate([
            'cover_photo_path' => ['sometimes','image', 'max:5120'],
            'title' => ['sometimes', 'string', 'max:255'],
            'introduction' => ['sometimes', 'string', 'max:255'], 
            'person' => ['sometimes', 'string', 'max:255'],
            'tip' => ['sometimes', 'string', 'max:255'],
    
            //'ingredients' => ['sometimes', 'array'],
            'ingredients.*.material' => ['sometimes', 'string', 'max:255'],
            'ingredients.*.quantity' => ['sometimes', 'string', 'max:255'],
            
            //'steps' => ['sometimes', 'array'],
            'steps.*.content' => ['sometimes', 'string', 'max:255'],
            'steps.*.step_photo_path' => ['nullable','image','max:5120'],
    
        ]);
    
        $recipe = Recipe::find($id);
        $user = auth()->id();
    
        // 編集権限がない場合、エラーを返す
        if ($recipe->user_id != $user) {
            return response()->json([
                'message' => 'You do not have permission to edit this recipe.'
            ], 403);
        }
    
        if ($request->has('title')) {
            $recipe->title = strip_tags($request->input('title'));
        }
    
        if ($request->has('introduction')) {
            $recipe->introduction = strip_tags($request->input('introduction'));
        }
    
        if ($request->has('person')) {
            $recipe->person = strip_tags($request->input('person'));
        }
    
        if ($request->has('tip')) {
            $recipe->tip = strip_tags($request->input('tip'));
        }
    
        if ($request->hasFile('cover_photo_path')) {
            $filename = 'cover-' . $user . '-' . uniqid() . '.jpg';
            $coverImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
            Storage::put('public/cover_image/' . $filename, $coverImg);
            Storage::delete('public/cover_image/' . $recipe->cover_photo_path);
            $recipe->cover_photo_path = $filename;
        }
    
        $recipe->save();
    
        // Ingredient(材料)の更新
        if ($request->has('ingredients')) {
            foreach ($request->input('ingredients') as $ingredientData) {
                if (isset($ingredientData['id'])) {
                    $ingredient = Ingredient::find($ingredientData['id']);
    
                    // 編集権限がない場合、スキップする
                    if ($ingredient->user_id != $user) {
                        continue;
                    }
    
                    if (isset($ingredientData['material'])) {
                        $ingredient->material = strip_tags($ingredientData['material']);
                    }
    
                    if (isset($ingredientData['quantity'])) {
                        $ingredient->quantity = strip_tags($ingredientData['quantity']);
                    }
    
                    $ingredient->save();
                }
                else {
                    $ingredient = new Ingredient();
                    $ingredient->material = strip_tags($ingredientData['material']);
                    $ingredient->quantity = strip_tags($ingredientData['quantity']);
                    $ingredient->recipe_id = $recipe->id;
                    $ingredient->user_id = $user;
                    $ingredient->save();
                }
            }
        }

        // Step（作り方）の更新
        if ($request->has('steps')) {
            foreach ($request->input('steps') as $stepData) {
                if (isset($stepData['id'])) {
                    $step = Step::find($stepData['id']);
                
                    // 編集権限がない場合、スキップする
                    if ($step->user_id != $user) {
                        continue;
                    }
                
                    if (isset($stepData['content'])) {
                        $step->content = strip_tags($stepData['content']);
                    }
                
                    if ($request->hasFile('step_photo_path')) {
                        $filename = 'step-' . $user . '-' . uniqid() . '.jpg';
                        $stepImg = Image::make($request->file('cover_photo_path'))->fit(800, 600)->encode('jpg');
                        Storage::put('public/step_image/' . $filename, $stepImg);
                        Storage::delete('public/step_image/' . $step->step_photo_path);
                        $step->step_photo_path = $filename;
                    }
                
                    $step->save();
                }
                else {
                    $step = new Step();
                    $step->content = strip_tags($stepData['content']);
                    $step->recipe_id = $recipe->id;
                    $step->user_id = $user;
                
                    if ($request->hasFile('step_photo_path')) {
                        $filename = 'step-' . $user . '-' . uniqid() . '.jpg';
                        $stepImg = Image::make($request->file('step_photo_path'))->fit(300, 400)->encode('jpg');
                        Storage::put('public/step_image/' . $filename, $stepImg);
                        $step->step_photo_path = $filename;
                    }
                
                    $step->save();
                }
            }
        }

    return response()->json([
        'message' => 'Recipe has been updated successfully.'
    ]);
}
    
    //レシピの投稿を削除する
    public function destroyRecipe(int $recipe_id) {
        $recipe = Recipe::find($recipe_id);
        $user = auth()->id();

        // レシピを存在するかどうかを確認する
        if (!$recipe) {
            return response()->json([
                'message' => 'Recipe not found'
            ], 404);
        }

        // Check if the user has permission to delete the recipe
        if ($recipe->user_id != $user) {
            return response()->json([
                'message' => 'You do not have permission to delete this recipe.'
            ], 403);
        }

        //論理削除を実装する
        $recipe->delete();

        //レシピ削除のルートをまだ確定できなくて、しばらくjsonで返そうと考える。
        return response()->json([
            'message' => 'Recipe has been deleted successfully.'
        ]);
    }

    public function searchRecipe(Request $request) {
        if($request->keyword) {
            $results = Recipe::where('title', 'LIKE', '%'.$request->keyword.'%')->latest()->paginate(15);
            $showRecipeData = Recipe::with('user')->first();
            $showUserData = $showRecipeData->user;
            return view('recipe.search', compact('results', 'showUserData'));
        } else {
            return redirect()->back()->with('message', 'Search Not Found');
        }

    }

}
