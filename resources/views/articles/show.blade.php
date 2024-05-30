<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="container my-5">
        <h1 class="title text-center">{{ $article->nom }}</h1>
        <hr>
        <img src="{{ $article->image }}" class="img-fluid article-image mb-4" alt="{{ $article->nom }}">
        <p>{{ $article->description }}</p>
        <p><strong>Date de création :</strong> {{ $article->date_de_creation }}</p>
        <p><strong>À la une :</strong> {{ $article->a_la_une ? 'Oui' : 'Non' }}</p>
        <a href="/article" class="btn btn-primary mb-4">Retour à la liste</a>

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
                    <label for="auteur" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="auteur" name="nom_complet_auteur" required>
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
