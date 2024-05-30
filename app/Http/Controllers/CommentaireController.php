<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{

    public function readCommentaire($article_id)
    {
        $article = Article::findOrFail($article_id);
        $commentaires = $article->commentaires;

        return view('commentaires.index', compact('article', 'commentaires'));
    }

    public function createCommentaireTreatment(Request $request, $article_id) {

        $request->validate([

            'contenu' => 'required',
            'nom_complet_auteur' => 'required'
        ]);
        $article = Article::findOrFail($article_id);

        $article->commentaires()->create([
            'contenu' => $request->contenu,
            'nom_complet_auteur' => $request->nom_complet_auteur
        ]);

        return back()->with('status', 'Le commentaire a été ajouter avec succès');

    }


}
