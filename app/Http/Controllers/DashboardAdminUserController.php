<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminUserController extends Controller
{
        public function index()
    {
        return view('pages.admin-dashboard-mitra');
    }
}
