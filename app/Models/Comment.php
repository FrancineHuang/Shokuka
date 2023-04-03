<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * commentsとusersの関係を定義
     */

    protected $fillable = [
        'id',
        'user_id',
        'recipe_id',
        'content',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }

    public function fetchCommentData($recipe_id) {
        $result = $this->where('recipe_id', $recipe_id)->get();

        return $result;
    }

}
