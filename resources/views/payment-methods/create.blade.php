@extends('layouts.app')

@section('content')
<div class="container" style="color:black;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Add payment method </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        @if (session('error'))
                          <div class="alert alert-danger">
                            {{ session('error') }}
                          </div>
                        @endif

                        <form action="{{ route('payment-methods.store') }}" method="post" id="checkout-form">
                          @csrf
                          <input type="hidden" name="payment-method" id="payment-method" value=""/>

                          <input id="card-holder-name" type="text" placeholder="Card holder name" class="form-control">

                          <!-- Stripe Elements Placeholder -->
                          <div id="card-element"></div>

                          </br>

                          <input type="checkbox" name="defautl" value="1"> Mark as default method
                          </br></br>

                          <button id="card-button" class="btn btn-primary">
                              Add method
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
      $( document ).ready(function() {
        let stripe = Stripe("pk_test_PTMDVnmpQg31nJLiqdjTELqh00t1HSAR9L")
        let elements = stripe.elements()
        let style = {
          base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        }
        let card = elements.create('card', {style: style})
        card.mount('#card-element')

        let paymentMethod = null
        $('#checkout-form').on('submit', function (e) {
          if (paymentMethod) {
            return true
          }
          stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
              payment_method: {
                card: card,
                billing_details: {name: $('#card-holder-name').val()}
              }
            }
          ).then(function (result) {
            if (result.error) {
              console.log(result)
              alert('error')
            } else {
              paymentMethod = result.setupIntent.payment_method
              $('#payment-method').val(paymentMethod)
              $('#checkout-form').submit()
            }
          })
          return false
        })
      });
    </script>
@endsection

@section('styles')
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection
