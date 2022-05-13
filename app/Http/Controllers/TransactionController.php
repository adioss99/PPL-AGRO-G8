<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionDetail;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
                            
        $onProcess = Transaction::all()
                            ->where('users_id', Auth::user()->id)
                            ->where('transaction_status','!=','SELESAI')
                            ->where('transaction_status','!=','DIKIRIM');

        $sent = Transaction::all()
                            ->where('users_id', Auth::user()->id)
                            ->where('transaction_status','DIKIRIM');

        $done = Transaction::all()
                            ->where('users_id', Auth::user()->id)
                            ->where('transaction_status','SELESAI');

        return view('pages.dashboard-transaction',[
            'onProcess' => $onProcess,
            'done' => $done,
            'sent' => $sent,
        ]);
    }
}
