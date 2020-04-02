<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Plan;
use DB;
// use App\Services\InvoicesService;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $payment = Payment::find();
        // (new InvoicesService())->generateInvoice($payment);
        $plans = Plan::all();
        $currentPlan = auth()->user()->subscription('default') ?? NULL;

        $paymentMethods = NULL;
        $defaultPaymentMethod = NULL;
        if (!is_null($currentPlan)) {
            $paymentMethods       = auth()->user()->paymentMethods();
            $defaultPaymentMethod = auth()->user()->defaultPaymentMethod();
        }

        return view('billing.index', compact('plans', 'currentPlan', 'paymentMethods', 'defaultPaymentMethod'));
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();
        // DB::table('model_has_roles')->where('model_id', Auth::id())->delete();
        // auth()->user()->assignRole('Free');
        return redirect()->route('billing');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();
        DB::table('model_has_roles')->where('model_id',Auth::id())->delete();
        auth()->user()->assignRole('Premium');
        return redirect()->route('billing');
    }
}
