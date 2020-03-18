<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

class PaymentController extends Controller
{
  /**
   * success response method.
   *
   * @return \Illuminate\Http\Response
   */
  public function stripe()
  {
      return view('payment');
  }

  /**
   * success response method.
   *
   * @return \Illuminate\Http\Response
   */
  public function stripePost(Request $request)
  {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      Stripe\Charge::create ([
              "amount" => 999,
              "currency" => "usd",
              "source" => $request->stripeToken,
              "description" => "Payment premium Flixnet",
              "email" => $request->stripeEmail
      ]);

      Session::flash('success', 'Payment successful!');

      return redirect('catalog');
  }
}
