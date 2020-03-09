<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .prices {
              background-color: #636b6f;
            }
            .prices_title {
              color : #fff;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
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
                    Streaming
                </div>

                <div class="links">
                    <p> Mettre une phrase d'accroche </p>
                </div>
            </div>
        </div>
        <div class="prices flex-center position-ref full-height ">
            <div class="content">
                <div class="title m-b-md prices_title">
                    Prices
                </div>

                <div style="display:inline-flex;">
                    <!-- <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a> -->
                    <div class="card" style="width: 25rem; margin-right:10%; border-radius:8%;">
                      <div class="card-body">
                        <h5 class="card-title"> 4$99 </h5>
                        <h6 class="card-subtitle mb-2 text-muted"> Limited </h6>
                        <p class="card-text"> <i class="fas fa-check"></i>  Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-text"> <i class="fas fa-times"></i>  Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-text"> <i class="fas fa-times"></i>  Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link"> Choose </a>
                      </div>
                    </div>
                    <div class="card" style="width: 25rem; border-radius:8%;">
                      <div class="card-body">
                        <h5 class="card-title"> 9$99 </h5>
                        <h6 class="card-subtitle mb-2 text-muted"> Illimited </h6>
                        <p class="card-text"> <i class="fas fa-check"></i>  Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-text"> <i class="fas fa-check"></i>  Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-text"> <i class="fas fa-check"></i>  Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link"> Choose </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
