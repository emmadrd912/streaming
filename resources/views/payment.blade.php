<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script type="module" src="{{asset('js/app.js')}}" ></script>

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #636b6f; */
                /* color: #636b6f; */
                color : #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .fond {
              background-repeat: no-repeat;
              background-size: cover;
              background-image: url({{ asset('img/fondfinal.png') }});
            }
            .panel-title {
              display: inline;
              font-weight: bold;
              }
              .display-table {
                  display: table;
              }
              .display-tr {
                  display: table-row;
              }
              .display-td {
                  display: table-cell;
                  vertical-align: middle;
                  width: 61%;
              }
              .colorb {
                color:black;
              }
        </style>
    </head>
    <body>
        <div class="fond full-height">
          <div class="container">

            <h1> Flixnet Payment </h1>
          </br>
          </br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box colorb">
                        <div class="panel-heading display-table" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Payment Details</h3>
                                <div class="display-td" >
                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <form
                                    role="form"
                                    action="{{ route('stripe.post') }}"
                                    method="post"
                                    class="require-validation"
                                    data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                    id="payment-form">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input
                                            class='form-control' size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input
                                            autocomplete='off' class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (9$99)</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

          </div>

          </body>

          <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

          <script type="text/javascript">
          $(function() {

            var $form         = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                  var $input = $(el);
                  if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                  }
                });

                if (!$form.data('cc-on-file')) {
                  e.preventDefault();
                  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                  Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                  }, stripeResponseHandler);
                }

          });

          function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

          });
          </script>
        </div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="module" src="{{asset('js/app.js')}}" ></script>
    </body>
</html>
