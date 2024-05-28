<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function readArticle() {

       $articles = Article::all();
       return view('articles.index', compact('articles'));
    }
}
