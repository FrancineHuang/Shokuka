<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Like;
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
        ],[
            'cover_photo_path.required' => '写真が正常にアップロードされませんでした。',
            'title.required' => 'タイトルを入力してください。',
            'introduction.required' => '紹介文を入力してください',
            'person.required' => '人数分を入力してください',
            'tip.required' => 'コツ・ポイントを入力してください',
            'ingredients.*.material.required' => '材料を入力してください',
            'ingredients.*.quantity.required' => '分量を入力してください',
            'steps.*.content.required' => 'ステップの説明を入力してください'
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
        $saveCoverImg = Storage::put('cover_image/' . $filename, $coverImg);
        
        if(!$saveCoverImg) {
            return back()->with('uploadError', '画像のアップロードに失敗しました。もう一度お試しください。');
        }

        $recipe->cover_photo_path = $filename;

        // レシピを保存
        $recipe->save();

        // 複数のIngredient(材料)を保存する
        $ingredientsData = $request->input('ingredients');
        if($ingredientsData != null) {
            foreach($ingredientsData as $ingredientData){
                $ingredient = new Ingredient();
                $ingredient->material = strip_tags($ingredientData['material']);
                $ingredient->quantity = strip_tags($ingredientData['quantity']);
                $ingredient->recipe_id = $recipe->id;
                $ingredient->user_id = $user->id;
                $ingredient->save();
            }
        }
            
            // recipe_ingredient→中間テーブルの紐つけ
            $recipe_ingredient = new RecipeIngredient();
            $recipe_ingredient->recipe_id = $recipe->id;
            $recipe_ingredient->ingredient_id = $ingredient->id;
            $recipe_ingredient->timestamps = false;
            $recipe_ingredient->save();
        

        // 複数のStep（作り方ステップ）の内容を保存する
        $stepsData = $request->all()['steps'];

        if ($stepsData != null) {
            foreach($stepsData as $stepData) {
                $step = new Step();
                $step->content = strip_tags($stepData['content']);
                $step->user_id = $user->id;
                $step->recipe_id = $recipe->id;
    
                //ステップ写真がnullではない場合だったら、アップロードする
                if(!empty($stepData['step_photo_path'])) {
                    // Step（作り方ステップ）の写真を保存する
                    $filename = 'step-' . $user->id . '-' . uniqid() . '.jpg';

                    try{
                        $stepImg =  Image::make($stepData['step_photo_path'])->fit(300, 300)->encode('jpg');
                    } catch(\Exception $e) {
                        Log::error('Image processing failed', [
                            'error' => $e->getMessage(),
                        ]);
                        throw $e;
                    }

                    $isStored = Storage::put('step_image/' . $filename, (string) $stepImg);
                    if(!$isStored) {
                        Log::error('Image storing failed', [
                            'filename' => $filename
                        ]);
                    }

                    $step->step_photo_path = $filename;
                }

                // Step（作り方ステップ）を保存する
                $step->save();

                /*
                //ステップ写真がnullではない場合だったら、アップロードする
                if(!empty($stepData['step_photo_path'])) {
                    // Step（作り方ステップ）の写真を保存する
                    $filename = 'step-' . $user->id . '-' . uniqid() . '.jpg';
                    $stepImg = Image::make($stepData['step_photo_path'])->fit(300, 300)->encode('jpg');
                    Storage::put('step_image/' . $filename, $stepImg);
                    $step->step_photo_path = $filename;
                }*/
                
                // recipe_step→中間テーブルの紐つけ
                $recipe_step = new RecipeStep();
                $recipe_step->recipe_id = $recipe->id;
                $recipe_step->step_id = $step->id;
                $recipe_step->timestamps = false;
                $recipe_step->save();
            }
        }

        return redirect()->route('recipe.show', ['recipe_id' => $recipe->id])->with('message', 'レシピが投稿されました！');
    }

    //レシピを表示させる
    public function showRecipe($recipe_id)
    {
        $showRecipeData = Recipe::with('user', 'ingredients', 'steps', 'comments')->find($recipe_id);
        $showUserData = $showRecipeData->user;
        $showIngredientData = $showRecipeData->ingredients;
        $showStepData = $showRecipeData->steps;
        $showCommentData = $showRecipeData->comments;
        $like = Like::where('recipe_id', $recipe_id)->where('user_id', auth()->user()->id)->first();

        return view('recipe.show', compact('showRecipeData', 'showUserData', 'showIngredientData', 'showStepData', 'showCommentData', 'like'));

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
    
        ],[
            'cover_photo_path.required' => '写真が正常にアップロードされませんでした。',
            'title.required' => 'タイトルを入力してください。',
            'introduction.required' => '紹介文を入力してください',
            'person.required' => '人数分を入力してください',
            'tip.required' => 'コツ・ポイントを入力してください',
            'ingredients.*.material.required' => '材料を入力してください',
            'ingredients.*.quantity.required' => '分量を入力してください',
            'steps.*.content.required' => 'ステップの説明を入力してください'
        ]);
    
        $recipe = Recipe::find($id);
        $user = auth()->id();
    
        /* 編集権限がない場合、エラーを返す
        if ($recipe->user_id != $user) {
            return response()->json([
                'message' => 'You do not have permission to edit this recipe.'
            ], 403);
        }*/
    
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
            Storage::put('cover_image/' . $filename, $coverImg);
            Storage::delete('cover_image/' . $recipe->cover_photo_path);
            $recipe->cover_photo_path = $filename;
        }
    
        $recipe->save();
    
        // Ingredient(材料)の更新
        $ingredientsData = $request->input('ingredients');
        if ($request->has('ingredients')) {
            foreach ($ingredientsData as $ingredientData) {
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
        $stepsData = $request->all()['steps']; 
        if ($request->has('steps')) {
            foreach ($stepsData as $stepData) {
                if (isset($stepData['id'])) {
                    $step = Step::find($stepData['id']);
                
                    // 編集権限がない場合、スキップする
                    if ($step->user_id != $user) {
                        continue;
                    }
                
                    if (isset($stepData['content'])) {
                        $step->content = strip_tags($stepData['content']);
                    }
                
                    if (isset($stepData['step_photo_path']) && !empty($stepData['step_photo_path'])) {
                        $filename = 'step-' . $user . '-' . uniqid() . '.jpg';
                        $stepImg = Image::make($request->file('step_photo_path'))->fit(800, 600)->encode('jpg');
                        Storage::put('step_image/' . $filename, $stepImg);
                        Storage::delete('step_image/' . $step->step_photo_path);
                        $step->step_photo_path = $filename;
                    }
                
                    $step->save();
                }
                else {
                    $step = new Step();
                    $step->content = strip_tags($stepData['content']);
                    $step->recipe_id = $recipe->id;
                    $step->user_id = $user;
                
                    if (isset($stepData['step_photo_path'])) {
                        $filename = 'step-' . $user . '-' . uniqid() . '.jpg';
                        $stepImg = Image::make($stepData['step_photo_path'])->fit(300, 400)->encode('jpg');
                        Storage::put('step_image/' . $filename, $stepImg);
                        $step->step_photo_path = $filename;
                    }
                
                    $step->save();
                }
            }
        }

        return redirect()->route('recipe.show', ['recipe_id' => $recipe->id])->with('message', 'レシピが更新されました！');;
}
    
    //レシピの投稿を削除する
    public function destroyRecipe(int $recipe_id) {
        $recipe = Recipe::find($recipe_id);
        $user = auth()->id();

        // レシピを存在するかどうかを確認する
        if (!$recipe) {
            return redirect()->route('dashboard')->with('alert', 'レシピを見つかりませんでした');
        }

        // ユーザーが削除の権限があるかどうかを確認する
        if ($recipe->user_id != $user) {
            return back()->with('alert', 'レシピを削除できませんでした');
        }

        //論理削除を実装する
        $recipe->delete();

        //レシピを削除されたら、ユーザー自身のページへ戻す
        return redirect()->route('dashboard')->with('message', 'レシピを削除しました');
    }

    public function searchRecipe(Request $request) {
        if($request->keyword) {
            $results = Recipe::where('title', 'LIKE', '%'.$request->keyword.'%')->latest()->paginate(15);
            $showRecipeData = Recipe::with('user')->first();
            $showUserData = $showRecipeData->user;
            return view('recipe.search', compact('results', 'showUserData'));
        } else {
            return redirect()->back()->with('alert', 'Search Not Found');
        }

    }

}
