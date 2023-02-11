<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        //Save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        //Proccess checkout
        $code = 'TRX-' . mt_rand(00000, 99999);
        $carts = Cart::with(['product', 'user'])
            ->where('user_id', Auth::user()->id)
            ->get();

        //Transaction create
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total_price' => $request->total_price,
            'code' => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(00000, 99999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'code' => $trx,
            ]);
        }

        //Delete cart data
        Cart::where('user_id', Auth::user()->id)->delete();

        return view('pages.success');
    }
}
