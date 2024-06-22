<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles - Liste des articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .card-img-top {
        object-fit: cover;
      }
      .featured-articles, .articles {
        margin-top: 40px;
      }
      .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      .btn-group {
        margin-top: auto;
      }
      .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
      }
      .header {
        min-height: 600px;
        background: url('https://cdn.pixabay.com/photo/2020/08/22/17/51/boat-5509027_1280.jpg') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 100px 0;
        text-align: center;
      }
      .header .container {
        width: 100%;
        height: 500px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      .header h1 {
        font-size: 3rem;
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Mon Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">À propos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Rechercher</button>
            </form>
          </div>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <h1>Bienvenue sur Mon Blog</h1>
            <p class="lead">Découvrez nos derniers articles et nos articles à la une</p>
        </div>
    </header>


    <div class="container">
        <h1 class="title text-center my-5">Liste des articles</h1>
        <div class="text-center mb-5">
            <a href="/create" class="btn btn-primary">Ajouter un article</a>
        </div>

        <!-- Featured Articles Section -->
        <div class="featured-articles">
            <h2 class="text-center">Articles à la une</h2>
            <hr>
            <div class="row">
                @foreach ($featuredArticles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $article->image_url }}" class="card-img-top" alt="{{ $article->nom }}" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($article->description, 100, $end='...') }}</p>
                            <p class="card-text"><small class="text-muted">{{ $article->created_at }}</small></p>
                            <div class="btn-group mt-auto">
                                <a href="/article/{{ $article->id }}" class="btn border btn-sm me-2">Voir plus</a>
                                <a href="/update/{{ $article->id }}" class="btn border-info btn-sm me-2">Modifier</a>
                                <a href="/delete/{{ $article->id }}" class="btn border-danger btn-sm">Supprimer</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

        <hr>

        <!-- Regular Articles Section -->
        <div class="articles">
            <h2 class="text-center">Tous les articles</h2>
            <hr>
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $article->image_url }}" class="card-img-top" alt="{{ $article->nom }}" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($article->description, 100, $end='...') }}</p>
                            <p class="card-text"><small class="text-muted">{{ $article->created_at }}</small></p>
                            <div class="btn-group">
                                <a href="/article/{{ $article->id }}" class="btn border btn-sm me-2">Voir plus</a>
                                <a href="/update/{{ $article->id }}" class="btn border-info btn-sm me-2">Modifier</a>
                                <a href="/delete/{{ $article->id }}" class="btn border-danger btn-sm">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
