<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script type="module" src="{{asset('js/app.js')}}" ></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body style="background-color: rgb(26, 29, 41);">
        <div class="heigth500 flex-center position-ref full-height fond">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @if(Auth::check())
                        @if (Auth::user()->isPremium())
                          <a href="{{ url('/catalog') }}">My account</a>
                        @endif
                    @endif
                    @if(Auth::check())
                        @if (Auth::user()->isAdmin())
                          <a href="{{ url('/catalog') }}">My account</a>
                        @endif
                    @endif
                    @if(Auth::check())
                        @if (Auth::user()->isFree())
                          <a href="{{ url('/catalogfree') }}">My account</a>
                        @endif
                    @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Flixnet
                </div>

                <div class="links">
                    <p> Welcome on the best streaming site </p>
                </div>
            </div>
        </div>
        <div class="prices flex-center position-ref full-height ">
            <div class="content">
                <div class="title m-b-md prices_title">
                    Prices
                </div>

                <div class="pricesflex">
                    <!-- <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a> -->
                    <div class="mediaprices boxes card prices_title">
                      <div class="card-body">
                        <h5 class="bold card-title"> Free </h5>
                        <h6 class="ita card-subtitle mb-2 text-muted"> Limited </h6>
                        <p class="card-text"> <i class="fas fa-check"></i>  Limited to 2 random movie per day.</p>
                        <p class="card-text"> <i class="fas fa-check"></i>  Limited to 1 random TV show episode per day.</p>
                        <a href="{{ route('login') }}" class="card-link"> Choose </a>
                      </div>
                    </div>
                    <div class="mediaprices boxes card prices_title">
                      <div class="card-body">
                        <h5 class="bold card-title"> 9$99 </h5>
                        <h6 class="ita card-subtitle mb-2 text-muted"> Unlimited </h6>
                        <p class="card-text"> <i class="fas fa-check"></i>  Unlimited access to all the movie.</p>
                        <p class="card-text"> <i class="fas fa-check"></i>  Unlimited access to all TV show episode.</p>
                        <br/>
                        <a href="{{ route('login') }}" class="card-link"> Choose </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fond flex-center position-ref full-height">
            <div class="content">
                <div class="m-b-md titre50">
                    Your favorite movies & shows in one place
                </div>
                <div class="links">
                  <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" id="poster" class="mar5"/>
                  <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" id="poster1" class="mar5"/>
                  <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" id="poster2" class="mar5"/>
                  <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" id="poster3" class="mar5"/>
                  <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" id="poster4" class="mar5"/>
                </div>
            </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="module" src="{{asset('js/app.js')}}" ></script>
    </body>
</html>
