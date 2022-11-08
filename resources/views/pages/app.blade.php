<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" >
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Forum&family=Neuton:ital@1&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('stylesheet')
    <title>My blog</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a {{Request::is('/') ? "active" : ""}} class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a {{Request::is('/blog') ? "active" : ""}} class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
              <a {{Request::is('/about') ? "active" : ""}} class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a {{Request::is('/contact') ? "active" : ""}} class="nav-link" href="/contact">Contact</a>
            </li>
          </ul>

          <div class="my-2 mx-5">

            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-default btn-block" href="{{ route('login') }}">Login</a>
                    </li>
                     <li class="nav-item">
                        <a class="btn btn-default btn-block" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              hello {{Auth::User()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/posts">Posts</a>
                              <a class="dropdown-item" href="/categories">Categories</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                            </div>
                          </li>
                        </ul>
                    </li>
                @endguest
            </ul>
          </div>


        </div>
      </nav>


      <div class="mt-4">
        @include('partials._messages')
        @yield('content')
      </div>

      @yield('script')

</body>
</html>
