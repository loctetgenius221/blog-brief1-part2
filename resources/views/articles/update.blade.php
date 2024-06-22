<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="container">
        <h1 class="title text-center">Modifier un article</h1>
        <a href="/" class="">Retourner à la liste des articles</a>
    <hr>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>

    <form action="/update/treatment" method="post">
        @csrf
        <input type="text" name="id" style="display: none;" value="{{ $articles->id }}">

        <div class="form-group">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $articles->nom }}">
        </div>
        <br>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $articles->description }}">
        </div>
        <br>
        <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date_creation" value="{{ $articles->date_creation }}">
        </div>
        <br>
        <label for="a_la_une">À la une:</label>
        <select name="a_la_une" id="a_la_une" required>
            <option value="1" {{ old('a_la_une', $articles->a_la_une) == 1 ? 'selected' : '' }}>Oui</option>
            <option value="0" {{ old('a_la_une', $articles->a_la_une) == 0 ? 'selected' : '' }}>Non</option>
        </select>
        <br>
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control" id="image" name="image_url" placeholder="Entrer l'url de votre image ici.." value="{{ $articles->image_url }}">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Ajouter l'article</button>
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
