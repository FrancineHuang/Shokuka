<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;


class CommentController extends Controller
{
    /**
     * コメントを作成する
     */

    public function storeNewComment(Request $request, $recipe_id) {

        $request->validate([
            'content' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find(auth()->id());
        $recipe = Recipe::find($recipe_id);

        $comment = new Comment();
        $comment->content = strip_tags($request->input('content'));
        $comment->user_id = $user->id;
        $comment->recipe_id = $recipe->id;
        $comment->save();

        return back();

    }

    /**
     * コメントを編集する
     */

    public function editComment() {
        

    }

    /**
     * コメントを更新する
     */

    /**
     * コメントを削除する
     */
}
