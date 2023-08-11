<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'step_photo_path',
        'content'
    ];

    public function recipes() {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    /**
     * recipeテーブルから一意の投稿データを取得
     */

    public function fetchStepData($recipe_id) {
        return $this->find($recipe_id);
    }

}
