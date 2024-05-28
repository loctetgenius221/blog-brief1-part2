<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function readArticle() {

       $articles = Article::where('a_la_une', '0')->get();
       $featuredArticles = Article::where('a_la_une', '1')->get();

       return view('articles.index', [

        'articles' => $articles,
        'featuredArticles' => $featuredArticles
       ]);
    }

    public function createArticle() {

        return view('articles.create');
    }

    public function createArticleTreatment(Request $request) {

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
            'date_creation' => 'required|date',
            'a_la_une' => 'required'
        ]);
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image_url = $request->image_url;
        $article->date_creation = $request->date_creation;
        $article->a_la_une = $request->a_la_une;
        $article->save();

        return redirect('create')->with('status', 'L\'article a bien été enregistrer.');

    }

    public function updateArticle($id) {
        $articles = Article::find($id);
        return view('articles.update', compact('articles'));
    }

    public function updateArticleTreatment(Request $request) {

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
            'date_creation' => 'required|date',
            'a_la_une' => 'required|boolean'
        ]);
        $article = Article::find($request->id);
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image_url = $request->image_url;
        $article->date_creation = $request->date_creation;
        $article->a_la_une = $request->a_la_une;
        $article->update();

        return redirect('create')->with('status', 'L\'article a bien été modifer.');

    }
}
