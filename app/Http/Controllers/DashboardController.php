<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        $pay = Transaction::all()
            ->where('users_id', Auth::user()->id)
            ->where('transaction_status','PENDING');
                            
        $onProcess = Transaction::all()
            ->where('users_id', Auth::user()->id)
            ->where('transaction_status','DIPROSES');

        $sent = Transaction::all()
            ->where('users_id', Auth::user()->id)
            ->where('transaction_status','DIKIRIM');

        $done = Transaction::all()
            ->where('users_id', Auth::user()->id)
            ->where('transaction_status','DITERIMA');

        return view('pages.dashboard',[
            'pay' => $pay->count(),
            'onProcess' => $onProcess->count(),
            'sent' => $sent->count(),
            'done' => $done->count(),
            'products' => $products->count()
        ]);
    }
}
