<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable =[
        'material',
        'quantity'
    ];

    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    /**
     * recipeテーブルから一意の投稿データを取得
     */

    public function fetchIngredientData($recipe_id) {
        return $this->find($recipe_id);
    }
    

}
