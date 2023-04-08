<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'id',
        'user_id',
        'recipe_id',
        'content',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * commentsとusersの関係を定義
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * commentsとrecipesの関係を定義
     */
    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'recipe');
    }

    /**
     * レシピIDに紐づいたコメントを全て取得する
     */
    public function getAllCommentsByRecipeId($recipe_id) {
        $result = $this->where('recipe_id', $recipe_id)->get();

        return $result;
    }

}
