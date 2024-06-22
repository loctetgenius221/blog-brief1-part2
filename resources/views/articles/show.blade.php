<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .article-image {
        max-height: 500px;
        object-fit: cover;
        width: 100%;
      }
      .comment {
        background-color: #f8f9fa;
        border-radius: 0.25rem;
        padding: 1rem;
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
              </li>deleteComments
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Rechercher</button>
            </form>
          </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="title text-center">{{ $article->nom }}</h1>
        <hr>
        <img src="{{ $article->image_url }}" class="img-fluid article-image mb-4" alt="{{ $article->nom }}">
        <p>{{ $article->description }}</p>
        <p><strong>Date de création :</strong> {{ $article->date_de_creation }}</p>
        <p><strong>À la une :</strong> {{ $article->a_la_une ? 'Oui' : 'Non' }}</p>
        <a href="/" class="btn btn-primary mb-4">Retour à la liste</a>

        <hr>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif


        <!-- Section des commentaires -->
        <div class="comments-section">
            <h2>Commentaires</h2>
            <ul class="list-unstyled">
                @foreach($article->commentaires as $commentaire)
                    <li class="comment mb-3">
                        <strong>{{ $commentaire->nom_complet_auteur }}</strong>
                        <p>{{ $commentaire->contenu }}</p>
                        <small class="text-muted">Posté le {{ $commentaire->created_at->format('d/m/Y') }}</small>
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="/updateComments/{{ $commentaire->id }}" class="text-primary"><i class="fa-solid fa-pencil"></i></a>
                            <a href="/deleteComments/{{ $commentaire->id }}" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Formulaire pour ajouter un commentaire -->
        <div class="comment-form mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            <h3>Ajouter un commentaire</h3>
            <form action="{{ route('comment.store', $article->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom_complet_auteur" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" required>
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
