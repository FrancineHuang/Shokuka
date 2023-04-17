<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{

    private $comment;

    public function __construct() {
        $this->comment = new Comment();
    }
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

        return redirect()->back();

    }

    /**
     * コメントを表示する
     */

    public function showComment($recipe_id) {
        $recipe = Recipe::find($recipe_id);
        $recipe_id = $recipe->id;

        $showCommentData = $this->comment->getAllCommentsByRecipeId($recipe_id)->with('user')->first();
        $showUserData = $showCommentData->user;

        return view('recipe.show', compact([
            'recipe' => $recipe,
            'recipe_id' => $recipe_id,
            'showCommentData' => $showCommentData,
            'showUserData' => $showUserData
        ]));
    }

    /**
     * コメントを更新する
     */
    public function update() {

    }

    /**
     * コメントを削除する
     */
    public function destroyComment($recipe_id, $id) {
        $comment = Comment::find($id);
    
        // Check if the comment exists
        if (!$comment) {
            return redirect()->back()->withErrors(['Comment not found.']);
        }
    
        // Check if the user is authorized to delete the comment
        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->withErrors(['You are not authorized to delete this comment.']);
        }
    
        // Soft delete the comment
        $comment->delete();
    
        // Redirect back to the previous page
        return redirect()->back();
    }

}
