<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// class registerController extends Controller
// {
//     public function index(){
        
//         return view('auth.register', [
//             'title' => 'register',
//             ]);
//     }

//     public function store(Request $request){
//         $validatedData = $request->validate([
//             'full_name' => 'required|max:255',
//             'alamat' => 'required|max:255',
//             'phone_number' => 'required|min:10|max:15',
//             'email' => "required|email:dns|unique:users",
//             'password' => 'required|min:8|max:255'
//         ]);

//         $validatedData['password'] = Hash::make($validatedData['password']);
        
//         User::create($validatedData);
        
//         $request->session()->flash('success','Registration successfull! Please login');

//         return redirect('/login')->with('success','Registration successfull! Please login');
//     }
// }
