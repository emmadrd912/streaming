<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
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
        return redirect()->route('billing');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();
        return redirect()->route('billing');
    }
}
