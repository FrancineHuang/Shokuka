<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_photo_path',
        'title',
        'catchcopy',
        'person',
        'tip'
    ];

    //レシピを取得
    public function getRecipe() {
        $query_step = Request::query('step');
        $query_ingredient = Request::query('ingredient');
        $query_recipes = Recipe::query()
            ->select('recipes.*')
            ->where('user_id', '=', Auth::id())
            ->whereNull('deleted_at')
            ->get();
        
        if(!empty($query_step)) {
            $query_recipes->leftJoin('recipe_steps', 'recipe_steps.recipe_id', '=', 'recipe.id')
            ->where('recipe_steps.step_id', '=', $query_step);
        }

        if(!empty($query_ingredient)) {
            $query_recipes->leftJoin('recipe_ingredients', 'recipe_ingredients.recipe_id', '=', 'recipe.id')
            ->where('recipe_ingredients.ingredient_id', '=', $query_ingredient);
        }

        $recipes = $query_recipes->get();

        return $recipes;

    }

}
