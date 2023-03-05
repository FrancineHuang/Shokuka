<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        //'cover_photo_path',
        'title',
        'introduction', //catchcopy -> introduction
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

    //ステップ写真があれば->保存する
    //なければ->デフォルトの写真を使う。
    //後ほどステップ写真の実装をするときにコメントアウトを外す。
    /*protected function coverPhoto(): Attribute {
        return Attribute::make(get: function($value) {
            return $value ? '/storage/step_images/' . $value : '/default-step-photo.jpg';
        });
    }*/

}
