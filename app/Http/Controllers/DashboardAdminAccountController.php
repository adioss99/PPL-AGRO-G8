<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminAccountController extends Controller
{
    public function index()
    {
        return view('pages.admin-dashboard-accounts');
    }

    public function edit()
    {
        $user = Auth::user();

        return view('pages.admin-dashboard-accounts-edit',[
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {   

        $acc = $request -> validate([

            'full_name' => 'required|string',
            'alamat' => 'required',

            'email' => ['required','string','unique:users,email,'.auth()->id()],
            'phone_number' => ['required','string','unique:users,phone_number,'.auth()->id()],

        ]);

        auth()->user()->update($acc);
        
        return redirect()->route('admin-dashboard-accounts')->with('toast_success','Berhasil Mengupdate Profile Anda');
    }

}
