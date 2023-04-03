<?php

namespace App\Models;

use App\Models\Step;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'recipes';

    protected $fillable = [
        'id',
        'user_id',
        'cover_photo_path',
        'title',
        'introduction',
        'person',
        'tip',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $primaryKey = 'id';


    /**
     * ユーザーモデルとのリレーション
     */

    public function users() {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Step（作り方ステップ）モデルとのリレーション
     */
    public function steps() {
        return $this->hasMany(Step::class, 'recipe_id', 'id');
    }

    /**
     * Ingredient（材料）モデルとのリレーション
     */
    public function ingredients() {
        return $this->hasMany(Ingredient::class, 'recipe_id', 'id');
    }

    /**
     * Comment（コメント）モデルとのリレーション
     */

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * recipeテーブルから一意の投稿データを取得
     */

    public function fetchRecipeData($recipe_id) {
        $recipeData = $this->with('ingredients', 'steps')->where('id', $recipe_id)->firstOrFail();
        return $recipeData;
    }

    /**
     * ユーザーIDに紐づいたレシピリストを全て取得する
     */
    public function getAllRecipesByUserId($user_id) {
        $result = $this->where('user_id', $user_id)->with('ingredients', 'steps')->get();
        return $result;
    }

}
