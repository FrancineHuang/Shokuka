<?php

namespace App\Models;

use App\Models\Step;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_photo_path',
        'title',
        'introduction',
        'person',
        'tip',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    //レシピを取得
    public function getRecipe() {
        $query_step = Request::query('step');
        $query_ingredient = Request::query('ingredient');
        $query_recipes = Recipe::query()
            ->select('recipes.*')
            ->where('user_id', '=', Auth::id())
            ->whereNull('deleted_at');
    
        if(!empty($query_step)) {
            $query_recipes->leftJoin('recipe_steps', 'recipe_steps.recipe_id', '=', 'recipes.id')
                ->where('recipe_steps.step_id', '=', $query_step);
        }
    
        if(!empty($query_ingredient)) {
            $query_recipes->leftJoin('recipe_ingredients', 'recipe_ingredients.recipe_id', '=', 'recipes.id')
                ->where('recipe_ingredients.ingredient_id', '=', $query_ingredient);
        }
    
        $recipes = $query_recipes->get();
    
        return $recipes;
    }

    /**
     * Step（作り方ステップ）モデルとリレーション
     */
    public function steps() {
        return $this->belongsToMany(Step::class, 'recipe_steps');
    }

    /**
     * Ingredient（材料）モデルとリレーション
     */
    public function ingredients() {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients');
    }

    /**
     * recipeテーブルから一意の投稿データを取得
     */

    public function fetchRecipeData($recipe_id) {
        return $this->find($recipe_id);
    }

    /**
     * ユーザーIDに紐づいたレシピリストを全て取得する
     */
    public function getAllRecipesByUserId($user_id) {
        $result = $this->where('user_id', $user_id)->with('ingredient', 'step')->get();
        return $result;
    }

}
