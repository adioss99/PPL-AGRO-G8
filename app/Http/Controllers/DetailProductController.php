<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

// use App\Models\User;

class DetailProductController extends Controller
{
    
    public function index(Request $request, $id)
    {   
        $product = Product::with(['galleries','user'])->where('id',$id)->firstOrFail();
        if (auth()->user()->id==$product->users_id){
            return view('pages.dashboard-products-details-view',[
                'product' => $product,
            ]);
        }else{
            return abort(404,'data tidak ditemukan');
        }
    }

    public function add(Request $request, $id){
        $data = [
            'products_id' => $id,
            'qty' => 1,
            'user_id' => Auth::user()->id,
        ];
        Cart::create($data);
        return redirect()->route('cart')->with('toast_success','Berhasil ditambahkan');
    }
    
    // view admin
    public function admin(Request $request, $id)
    {   
        $product = Product::with(['galleries','user'])->where('id',$id)->firstOrFail();
        // dd($product);
        if (auth()->user()->roles=="ADMIN"){
            return view('pages.admin-products-details-view',[
                'product' => $product
            ]);
        }else{
            return abort(404,'data tidak ditemukan');
        }
    }
}
