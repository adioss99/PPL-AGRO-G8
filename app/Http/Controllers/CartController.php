<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $carts = Cart::with(['product.galleries','user'])
                ->where('user_id',Auth::user()->id)
                ->get();
        return view('pages.cart',[
            'carts' => $carts,
            'user' => $user
        ]);
    }

    public function delete(Request $request, $id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart')->with('toast_success','Berhasil dihapus');
    }

    public function changeQty(Request $request, $id)
    {   
        $cart = Cart::findOrFail($id)
            ->where('user_id',Auth::user()->id)
            ->where('id',$id)
            ->first();
        
        if ($request->change_to === 'down') {
            if (isset($cart)) {       
                $cart->qty = $cart->qty - 1;
                $cart->save();
                return redirect()->route('cart');
            }
        } else {
            if (isset($cart)) {
                $cart->qty = $cart->qty + 1;
                $cart->save();
                return redirect()->route('cart');
            }
        }
        return back();
    }

}
