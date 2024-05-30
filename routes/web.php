<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('article', [ArticleController::class, 'readArticle']);

Route::get('article/{id}', [ArticleController::class, 'showArticle'])->name('article.show');

Route::get('create', [ArticleController::class, 'createArticle']);
Route::post('create/treatment', [ArticleController::class, 'createArticleTreatment']);

Route::get('update/{id}', [ArticleController::class, 'updateArticle']);
Route::post('update/treatment', [ArticleController::class, 'updateArticleTreatment']);

Route::get('delete/{id}', [ArticleController::class, 'deleteArticle']);

// *********************************************************************************** //

Route::get('commentaires', [CommentaireController::class, 'readCommentaire'])->name('articles.commentaires.read');

Route::post('createCommentaire/{id}/treatment', [CommentaireController::class, 'createCommentaireTreatment'])->name('comment.store');

Route::get('updateComments/{id}', [CommentaireController::class, 'updateComments']);
Route::post('updateComments/{id}/treatment', [CommentaireController::class, 'updateCommentsTreatment'])->name('comment.update');

