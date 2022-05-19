<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
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
                        <a class="btn btn-primary" href="#">
                            Detail <i class="bi bi-eye-fill"></i>
                        </a>
                        ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin-transaction');
    }
}
