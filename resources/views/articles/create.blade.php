<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <h1 class="title text-center">Ajouter un article</h1>
        <a href="/article" class="">Retourner à la liste des articles</a>
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

    <form action="/create/treatment" method="post">
        @csrf
        <div class="form-group">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <br>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <br>
        <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date_creation">
        </div>
        <br>
        <label for="a_la_une">À la une:</label>
        <select name="a_la_une" id="a_la_une" required>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <br>
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control" id="image" name="image_url" placeholder="Entrer l'url de votre image ici..">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Ajouter l'article</button>
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
