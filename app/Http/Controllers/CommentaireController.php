<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
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

    public function updateComments($id) {

        $commentaire = Commentaire::findOrFail($id);

        return view('commentaires.updateComments', compact('commentaire'));
    }

    public function updateCommentsTreatment(Request $request, $id)
    {
        $request->validate([
            'contenu' => 'required',
            'nom_complet_auteur' => 'required'
        ]);

        $commentaire = Commentaire::findOrFail($id);

        $commentaire->update([
            'contenu' => $request->contenu,
            'nom_complet_auteur' => $request->nom_complet_auteur
        ]);

        return redirect()->route('article.show', $commentaire->article_id)->with('status', 'Le commentaire a été modifié avec succès');
    }


}
