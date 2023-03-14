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
        return $this->belongsTo(Recipe::class, 'recipe_id', 'step_id');
    }

}
