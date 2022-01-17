<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        if(Auth::check())
        {
            $product_id=$request->product;
            $price=Product::where('id',$product_id)->value('price');
            try
            {
                Stripe::setApiKey(env('STRIPE_SECRET'));

                $customer = Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source'  => $request->stripeToken
                ));

                Charge::create([
                    'customer' => $customer->id,
                    'amount' => 100 * $price,
                    'currency' => 'MAD'
                ]);

                Session::flash('success', 'Payment successfully made!');
                return back();
            }
            catch (Exception $ex)
            {
                Session::flash('error', $ex->getMessage());
                return back();
            }
        }
        else
        {
            abort(401);
        }
    }
}
