<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   public function process(Request $request){

      $user = Auth::user();
      // $user->update($request->except('total_price'));

      $carts = Cart::with(['product','user'])
            ->where('user_id',Auth::user()->id)
            ->get();
      
      $code = 'TRX-' . mt_rand(0000,9999);

      $transaction = Transaction::create([
         'users_id' => Auth::user()->id,
         'shipping_price' => $request->shipping_price,
         'total_price' => $request->total_price,
         'transaction_status' => 'PENDING',
         'resi' => ' ',
         'code' => $code,
         'name' => $request->name,
         'address' => $request->address,
         'phone' => $request->phone,

      ]);

      foreach($carts as $cart){
         TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'products_id' => $cart->product->id,
            'price' => $cart->product->price,
            'code' => $code,
            'qty'=> $cart->qty,  
            'total'=> $cart->qty * $cart->product->price   
         ]);
      }
      Cart::with(['product','user'])
                ->where('user_id',Auth::user()->id)
                ->delete();
      return redirect()->route('cart')->with('success','Berhasil menambahkan pesanan');
   }
}
