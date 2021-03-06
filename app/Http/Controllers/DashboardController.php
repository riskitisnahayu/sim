<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Student;
use App\Orangtua;
use App\User;
use App\LogActivity;
use App\StudentTask;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;

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
        // $siswaAll = Student::all();
        $ortu = DB::table('users')->where('type', '=', 'Orang tua')->count();
        $siswa = DB::table('users')->where('type', '=', 'Siswa')->count();
        $activities = LogActivity::with('user.student.orangtua.user')->limit(5)->orderBy('created_at', 'desc')->get();

        // $ortu2 = Orangtua::where('user_id', Auth::user()->id)->first();
        // $siswa2 = $ortu2->student->pluck('user_id'); //Collection contains only user_id(koleksi hanya berisi id user)
        // $activities = LogActivity::whereIn('user_id', $siswa2)->with('user.student')->get();

        // dd($activities);
        return view('admin.admin_dashboard', compact('activities', 'ortu','siswa'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    public function studentList(Request $request)
    {
            $siswa = Student::all()->sortByDesc('user_id');
            return view('admin.student_list', compact('siswa'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    public function studentActivity(Request $request)
    {
        $activities = LogActivity::with('user.student.orangtua.user')->orderBy('created_at', 'desc')->get();
        return view('admin.student_activity', compact('activities'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    public function studentResult(Request $request)
    {
        $studenttask = StudentTask::with('student')->orderBy('created_at', 'desc')->get();
        return view('admin.student_result', compact('studenttask'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    public function detailProfil()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.profil_detail',compact('user'));
    }

    public function editProfil()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.profil_edit',compact('user'));
    }

    public function updateProfil(Request $request){
        $data = User::where('id', Auth::user()->id)->first();
        $user = User::where('id',$data->id)->first();
        if ($request->username == $user->username && $request->email == $user->email) {
            $this->validate($request, [
                'name'          => 'required|max:191',
                'username'      => 'required|max:191',
                'email'         => 'required|email',
            ],

            [
                'name.required'     => 'Nama harus diisi!',
                'name.max'          => 'Nama terlalu panjang!',
                'username.required' => 'Username harus diisi!',
                'username.max'      => 'Username terlalu panjang!',
                'email.required'    => 'Email harus diisi!',
                'email.email'       => 'Format email tidak sesuai!',
            ]

            );
        }elseif ($request->username != $user->username && $request->email == $user->email) {
            $this->validate($request, [
                'name'          => 'required|max:191',
                'username'      => 'required|unique:users|max:191',
                'email'         => 'required|email',
            ],

            [
                'name.required'     => 'Nama harus diisi!',
                'name.max'          => 'Nama terlalu panjang!',
                'username.required' => 'Username harus diisi!',
                'username.unique'   => 'Username sudah terpakai!',
                'username.max'      => 'Username terlalu panjang!',
                'email.required'    => 'Email harus diisi!',
                'email.email'       => 'Format email tidak sesuai!',
            ]

            );
        }elseif ($request->username == $user->username && $request->email != $user->email) {
            $this->validate($request, [
                'name'          => 'required|max:191',
                'username'      => 'required|max:191',
                'email'         => 'required|unique:users|email',
            ],

            [
                'name.required'     => 'Nama harus diisi!',
                'name.max'          => 'Nama terlalu panjang!',
                'username.required' => 'Username harus diisi!',
                'username.max'      => 'Username terlalu panjang!',
                'email.required'    => 'Email harus diisi!',
                'email.unique'      => 'Email sudah terpakai!',
                'email.email'       => 'Format email tidak sesuai!',
            ]
            );
        }elseif ($request->username != $user->username && $request->email != $user->email) {
            $this->validate($request, [
                'name'          => 'required|max:191',
                'username'      => 'required|unique:users|max:191',
                'email'         => 'required|unique:users|email',
            ],

            [
                'name.required'     => 'Nama harus diisi!',
                'name.max'          => 'Nama terlalu panjang!',
                'username.required' => 'Username harus diisi!',
                'username.unique'   => 'Username sudah terpakai!',
                'username.max'      => 'Username terlalu panjang!',
                'email.required'    => 'Email harus diisi!',
                'email.unique'      => 'Email sudah terpakai!',
                'email.email'       => 'Format email tidak sesuai!',
            ]
            );
        }

       $user->name=$request->name;
       $user->username=$request->username;
       $user->email=$request->email;
       $user->save();

       Alert::success('Sukses', 'Data admin berhasil diubah!');

       return redirect()->route('admin.profil.detail');
    }

    public function editPassword()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.profil_password',compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $data = User::where('id',Auth::user()->id)->first();
        // dd($data);
        if (Hash::check($request->oldPassword, $data->password))
        {
            $data->password = Hash::make($request->password);
            $this->validate($request, [
                     'oldPassword'           => 'required',
                     'password'              => 'required|min:6|confirmed',
                     'password_confirmation' => 'required',
               ],
               [
                   'oldPassword.required'            => 'Password lama harus diisi!',
                   'password.required'               => 'Password baru harus diisi!',
                   'password.min'                   => 'Password minimal 6 karakter!',
                   'password.confirmed'             => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                ]
            );
           $data->save();

            Alert::success('Sukses', 'Password berhasil diubah!');
            return redirect()->route('admin.profil.detail');

        }else {
            $this->validate($request, [
                     'oldPassword'           => 'required',
                     'password'              => 'required|min:6|confirmed',
                     'password_confirmation' => 'required',
               ],
               [
                   'oldPassword.required'           => 'Password lama harus diisi!',
                   'password.required'              => 'Password baru harus diisi!',
                   'password.min'                   => 'Password minimal 6 karakter!',
                   'password.confirmed'             => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required' => 'Konfirmasi password baru harus diisi!',
                ]
            );
            return redirect()->back()->with('error','Password tidak sesuai!');
        }
    }

    public function adminGames()
    {
        return view('admin.admin_games');
    }

    public function index()
    {

    }

}
