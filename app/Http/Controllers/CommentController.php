<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'content' => 'required|max:500',
            'user_name' => 'required|max:255'
        ]);

        $article->comments()->create($validated);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Commentaire ajouté avec succès.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Commentaire supprimé avec succès.');
    }
}
