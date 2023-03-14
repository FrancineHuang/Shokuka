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
        'tip'
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
     * The steps that belong to the recipe.
     */
    public function steps() {
        return $this->hasMany(Step::class, 'recipe_id', 'step_id');
    }

    /**
     * The ingredients that belong to the recipe.
     */
    public function ingredients() {
        return $this->hasMany(Ingredient::class, 'recipe_id', 'ingredient_id');
    }

}
