<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles - Liste des articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="title text-center">Voici la liste des articles</h1><hr>
        <a href="/create" class="btn btn-primary">Ajouter un article</a>
        <hr>

        <div class="featured-articles">
            <h2 class="text-center">Articles à la une</h2><hr>
            <div class="row">
                @foreach ($featuredArticles as $article)
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}" width="100" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <p class="card-text">{{ $article->date_de_creation }}</p>
                            <div>
                                <a href="/article/{{ $article->id }}" class="btn btn-primary">Voir plus</a>
                                <a href="/update/{{ $article->id }}" class="btn btn-info">Modifier</a>
                                <a href="/delete/{{ $article->id }}" class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <hr>

        <h2 class="text-center">Articles</h2><hr>
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}" width="100" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->nom }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text">{{ $article->date_de_creation }}</p>
                        <div>
                            <a href="/article/{{ $article->id }}" class="btn btn-primary">Voir plus</a>
                            <a href="/update/{{ $article->id }}" class="btn btn-info">Modifier</a>
                            <a href="/delete/{{ $article->id }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
