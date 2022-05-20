<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;

class DashboardAdminController extends Controller
{
    public function index()
    {       
        $products = Product::all();

        $cust = User::all()
            ->where('roles','USER');

        $pay = Transaction::all()
            ->where('transaction_status','PENDING');
                            
        $onProcess = Transaction::all()
            ->where('transaction_status','DIPROSES');

        $sent = Transaction::all()
            ->where('transaction_status','DIKIRIM');

        $done = Transaction::all()
            ->where('transaction_status','DITERIMA');

        return view('pages.admin-dashboard',[
            'cust' => $cust->count(),
            'pay' => $pay->count(),
            'onProcess' => $onProcess->count(),
            'sent' => $sent->count(),
            'done' => $done->count(),
            'products' => $products->count()
        ]);
    }
}
