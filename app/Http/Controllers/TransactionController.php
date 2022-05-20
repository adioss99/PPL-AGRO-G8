<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionDetail;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        
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

        return view('pages.dashboard-transaction',[
            'pay' => $pay,
            'onProcess' => $onProcess,
            'sent' => $sent,
            'done' => $done,
        ]);
    }

    public function detail($id){
        $transaction = Transaction::all()
        ->where('users_id', Auth::user()->id)
        ->find($id);
        
        $detail = TransactionDetail::with(['transaction.user','product.galleries'])
            ->whereHas('transaction', function($transaction){
                $transaction->where('users_id', Auth::user()->id);
            })->where('transactions_id',$id)
            ->get();

        return view('pages.dashboard-transaction-detail',[
            'transaction' => $transaction,
            'detail' => $detail,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $item = Transaction::findOrFail($id);
        
        $item->update($data);
        
        return redirect()->route('transaction-detail', $id)->with('success','Pesanan Telah Diterima');
    }

}
