<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class adminTransactionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::with(['user']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('admin-transaction-detail', $item->id) . '">
                            Detail <i class="bi bi-eye-fill"></i>
                        </a>
                        ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin-transaction');
    }

    public function detail($id){
        $transaction = Transaction::find($id);
        
        $detail = TransactionDetail::with(['transaction.user','product.galleries'])
            ->where('transactions_id',$id)
            ->get();

        return view('pages.admin-transaction-detail',[
            'transaction' => $transaction,
            'detail' => $detail,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $item = Transaction::findOrFail($id);
        
        $item->update($data);
        
        return redirect()->route('admin-transaction-detail', $id);
    }

}
