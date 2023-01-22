<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\StripeClient;
use Illuminate\Support\Str;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request) {

        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'card_expiry_date' => 'required',
            'card_ccv' => 'required',
            'amount' => 'required',
            'invoice_id' => 'required|integer',
        ]);

        // validator fails
        if($validator->fails()) {
            flash()->addWarning('Please fill all the fields');
        } else {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            // try catch stripe token
            try {
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->card_no,
                        'exp_month' => explode('/', $request->card_expiry_date)[0],
                        'exp_year' => explode('/', $request->card_expiry_date)[1],
                        'cvc' => $request->card_ccv,
                    ],
                ]);
            } catch (\Exception $e) {
                flash()->addWarning('Invalid card details');
                return redirect()->back();
            }

            $charge = $stripe->charges->create([
                'amount' => intval($request->amount * 100),
                'currency' => 'usd',
                'description' => 'Payment for invoice #' . $request->invoice_id,
                'source' => $token->id,
            ]);

            Payment::create([
                'amount' => $request->amount,
                'invoice_id' => $request->invoice_id,
                'transaction_id' => $charge->id,
            ]);

            flash()->addSuccess('Payment successful');
        }
        return redirect()->back();
    }

    public function cashPayment () {
        $validator = Validator::make(request()->all(), [
            'amount' => 'required',
            'invoice_id' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addWarning('Please fill in all the fields');
            return redirect()->back()->withErrors($validator);
        } else {
            Payment::create([
                'invoice_id' => request()->invoice_id,
                'amount' => request()->amount,
                'transaction_id' => Str::random(8),
            ]);

            flash()->addSuccess('Payment successful');
            return redirect()->back();
        }
    }
}
