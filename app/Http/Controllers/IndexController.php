<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Store\Manager\Services\Token\TokenService;

class IndexController extends Controller
{
    protected $store;
    protected $cartService;
    protected $checkoutService;


    private static function token(){

        return (new TokenService())->token() ?? '';
    }

    public function index(){
        $products = products();
        return view('web::pages.home', compact('products'));
    }

    public function order_checkout(Request $request){
        $data =  $request->all();
        $cart_checkout = cart_checkout_items();
        $data['cart_checkout'] = $cart_checkout;
        // add the data to session
        session()->put('checkout_form_data', $data);
        $cart_checkout = cart_checkout();
        // dd($cart_checkout);
        $total = _value(cartValue("cart"), "value");
        session()->put(\Stripe\App\StripeConstants::CHECKOUT_TOTAL, $total);
        session()->put(\Stripe\App\StripeConstants::CHECKOUT_ITEMS, $cart_checkout);
        session()->put(\Stripe\App\StripeConstants::CHECKOUT_REFERENCE, $data['order_code']);
        return redirect()->route('stripe.pay');
    }

    public function applyVoucher(Request $request){
        $voucher_code = [
            'code' => '267dh78',
            'amount' => floatval(5.00),
            'status' => 'success',
        ];
        $total = total()->total;
        $min_order =  50;
        $calculate = $total - $voucher_code['amount'];

        // if voucher code does not exist.
        if($voucher_code['code'] != $request->voucher_code){
            return response()->json([
                'status' => 'error',
                'message' => 'Voucher code does not exist.',
            ]);
        }

        //minimum order is met
        if ($min_order >= $total ?? 0)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Minimum order required for this voucher must be above ' . currency() . $min_order,
            ]);
        }

        // prevent multiple voucher per order
        if (session()->get('voucher'))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'You already have a voucher in this order!',
            ]);
        }

        $value = $calculate;

        session()->put('voucher', [
            'value' => $value ?? 0,
            'voucher_code' => $voucher_code['code'] ?? '--invalid--',
            'voucher_amount' => $voucher_code['amount'] ?? 0,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Voucher applied successfully!',
            'voucher' => session()->get('voucher'),
            'total' => $value,
        ]);

    }
}
