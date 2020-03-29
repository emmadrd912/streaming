<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Plan;
use Stripe\Stripe;
use App\Country;
use DB;

class CheckoutController extends Controller
{
    public function checkout($plan_id)
    {
        Stripe::setApiKey('sk_test_uJYycnkwZTS8ICfRzHNxL51J00pfuxgyz7');
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
        return redirect()->route('billing')->withMessage('Subscribed successfully!');
       } catch (\Exception $e) {
           return redirect()->back()->withError($e->getMessage());
       }
    }
}
