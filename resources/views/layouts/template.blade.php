{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="..." class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div> --}}

  {{-- resources/views/template.blade.php --}}
{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Film</h1>

        @foreach ($movies as $movie)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $movie->poster_url }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                            <p class="card-text"><small class="text-muted">Rilis: {{ $movie->release_year }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie DB -  @yield ('title','Homepage')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  
  <body>

    <nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="#">Movie DB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        @auth
  <li class="nav-item">
    <a class="nav-link" href="/movie/create">Input Movie</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">{{ Auth::user()->name }}</a>
  </li>
  <li class="nav-item">
  <form method="POST" action="/logout" style="display: inline;" onsubmit="return confirm('Yakin mau logout?')">
    @csrf
    <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0; margin: 0; border: none; background: none; color: white; text-decoration: none;">
      Logout
    </button>
  </form>
</li>


@else
  <li class="nav-item">
    <a class="nav-link" href="/login">Login</a>
  </li>
@endauth


        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> --}}
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container my-2">
   @yield('content') 

</div>



    {{-- <div class="container py-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($movies as $movie)
          <div class="col">
            <div class="card h-100">
              <img src="{{ $movie->cover_image }}" class="card-img-top" alt="{{ $movie->title }}">
              <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">{{ Str::limit($movie->synopsis, 100) }}</p>
                <p class="text-muted"><strong>Tahun:</strong> {{ $movie->year }}</p>
                <p class="text-muted"><strong>Pemeran:</strong> {{ $movie->actors }}</p>
                <a href="#" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div> --}}

    <div class="bg-success py-2 text-white text-center">
    Copyright &copy; 2025 develop by haura
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
