<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {

    }

    // This function is used for set data and view to admin dashboard
    // Do you understand?
   // ngopo kudu nggo iki?
   //soale tiap view yang ada pasti diatur oleh salah satu fungsi yang ada di Controller
   // This called MVC (Model View Controller)
   // Jd nek koe nggawe route terus return e view kui ki SALAHHH
    public function adminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function adminGames()
    {
        return view('admin.admin_games');
    }
}
