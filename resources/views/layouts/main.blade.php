<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
          <a class="navbar-brand" href="/home">UStore</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('books') ? 'active' : '' }}" href="/books">Book List</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('categories/*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/guestcategories/1">History</a></li>
                  <li><a class="dropdown-item" href="/guestcategories/2">Religion</a></li>
                  {{-- <li><hr class="dropdown-divider"></li> --}}
                  {{-- <li><a class="dropdown-item" href="/guestcategories/3">Science</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
              </li> --}}
              {{-- <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li> --}}
            </ul>
            {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}

            @auth

  <ul class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Welcome Back, {{ auth()->user()->name }}
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="/index"><i class="bi bi-book"></i> Admin Panel </a></li>
      <li><hr class="dropdown-divider"></li>
      {{-- <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-book"></i> Favorite</a></li>
      <li><hr class="dropdown-divider"></li> --}}
      <form action="/logout" method="post">
        @csrf
        <button type ="submit" class = "dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</a></button>
      </form>
      {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li> --}}
    </ul>
  </li>
</ul>

   @else


  <form action="" method="post">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link {{ Request::is('login') ? 'active' : '' }}">
                <i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
    </ul>
    </form>
  @endauth

                    </ul>
              </div>
          </div>
        </div>
      </nav>
    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>
