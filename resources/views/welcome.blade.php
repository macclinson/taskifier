<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
  <body>
      <nav class="navbar navbar-fixed-top" role="navigation">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <!-- Branding Image -->
                  <a class="navbar-brand" href="{{ url('/') }}">
                    Taskify
                      <!-- {{ config('app.name', 'Laravel') }} -->
                      <!-- <img src="{{URL::asset('/images/logo.png')}}" class="img-responsive" alt="Taskify" /> -->
                  </a>
              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      @guest
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                          <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                          <li>
                              <a href="#" aria-haspopup="true">
                                  {{ Auth::user()->name }}
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>

                      @endguest
                  </ul>
              </div>
          </div>
      </nav>
      <section>
        <div class="page-title top-content" style="position: relative; z-index: 0; background: none;">
          <div class="page-title-text wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
            	<h1 class="text-center">Keep track of your tasks</h1>
            	<p class="text-center">Create and keep track of your tasks.</p>
              <p class="text-center">Mark them off as complete when done</p>
              <p class="text-center">Edit tasks in between.</p>
            	<div class="subscribe text-center">
                <a href="/create" class="btn btn-primary bounce-animated-btn bounce">
                  <i class="material-icons bounce-animated-icon">add</i>
                  <span class="bounce-animated-text">Create Task</span>
                </a>
            	</div>
          </div>
          <div class="backstretch">
            <img src="{{URL::asset('/images/bckgrd.jpg')}}">
          </div>
        </div>
      </section>
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->
        <!-- Scripts -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            //Call to action bounce animation
            $('.bounce-animated-btn').on('click', function(){
              $(this).removeClass('bounce').addClass('bounce-faster active');
              setTimeout(function(){
                $('.bounce-animated-btn').removeClass('bounce-faster active').addClass('bounce');
              }, 1000);
            });
          });
        </script>
    </body>
</html>
