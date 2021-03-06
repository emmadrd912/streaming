<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Plan;
use App\User;
use Mail;
use Stripe\Stripe;
use App\Country;
use DB;

class CheckoutController extends Controller
{
    public function checkout($plan_id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $plan = Plan::findOrFail($plan_id);
        $countries = Country::all();

        $currentPlan = auth()->user()->subscription('default')->stripe_plan ?? NULL;
        if (!is_null($currentPlan) && $currentPlan != $plan->stripe_plan_id) {
          auth()->user()->subscription('default')->swap($plan->stripe_plan_id);
          return redirect()->route('billing');
        }

        $intent = auth()->user()->createSetupIntent();
        return view('billing.checkout', compact('plan', 'intent', 'countries'));
    }

    public function processCheckout (Request $request) {
      $plan = Plan::findOrFail($request->input('billing_plan_id'));
      try {
        auth()->user()->newSubscription('default', $plan->stripe_plan_id)->create($request->input('payment-method'));
        auth()->user()->update([
                'trial_ends_at' => NULL,
                'company_name' => $request->input('company_name'),
                'address_line_1' => $request->input('address_line_1'),
                'country_id' => $request->input('country_id'),
                'city' => $request->input('city'),
                'postcode' => $request->input('postcode'),
            ]);
        DB::table('model_has_roles')->where('model_id',Auth::id())->delete();
        auth()->user()->assignRole('Premium');
        $to_email = auth()->user()->email;
        $to_name = auth()->user()->name;
        $test = array('name'=>$to_name, "body" => "Vous êtes passer premium");
        Mail::send('emails.mail', $test, function($message) use ($to_name, $to_email)
        {
            $message->to($to_email, $to_name)
                    ->subject('Premium Flixnet');
            $message->from('mymonitornawak@gmail.com', 'flixnet');
        });
        return redirect()->route('billing')->withMessage('Subscribed successfully!');
       } catch (\Exception $e) {
           return redirect()->back()->withError($e->getMessage());
       }
    }

    public function invoices()
  {
    $invoices = auth()->user()->invoices();
    return view('invoices', compact('invoices'));
  }

  public function downloadInvoice($invoiceId)
  {
      return Auth::user()->downloadInvoice($invoiceId, [
          'vendor'  => 'Flixnet',
          'product' => 'Monthly Subscription Premium'
      ]);
  }
}
