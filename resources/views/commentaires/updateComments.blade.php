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
    <div class="container my-5">

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <!-- Formulaire pour ajouter un commentaire -->
        <div class="comment-form mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            <h3>Ajouter un commentaire</h3>
            <form action="{{ route('comment.update', $commentaire->id) }}" method="POST">
                @csrf
                <input type="text" name="id" style="display: none;" value="{{ $commentaire->id }}">

                <div class="mb-3">
                    <label for="auteur" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="auteur" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}" required>
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="3" required> {{ $commentaire->contenu }} </textarea>
                </div>
                <button typeEnvoyer="submit" class="btn btn-primary">Modifier le commentaire</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
