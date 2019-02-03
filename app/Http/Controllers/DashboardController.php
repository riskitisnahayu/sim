<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Student;
use App\Orangtua;
use App\User;

class DashboardController extends Controller
{


    // This function is used for set data and view to admin dashboard
    // Do you understand?
   // ngopo kudu nggo iki?
   //soale tiap view yang ada pasti diatur oleh salah satu fungsi yang ada di Controller
   // This called MVC (Model View Controller)
   // Jd nek koe nggawe route terus return e view kui ki SALAHHH
    public function adminDashboard(Request $request)
    {
        $siswaAll = Student::all();
        $ortu = DB::table('users')->where('type', '=', 'Orang tua')->count();
        $siswa = DB::table('users')->where('type', '=', 'Siswa')->count();


        // dd($users);
        return view('admin.admin_dashboard', compact('ortu','siswa','siswaAll'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    public function adminGames()
    {
        return view('admin.admin_games');
    }

    public function index()
    {
        // $siswa = Student::all();
        // $ortu  = Orangtua::all();
        // return view('admin.user_dashboard', compact('siswa','ortu'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

}
