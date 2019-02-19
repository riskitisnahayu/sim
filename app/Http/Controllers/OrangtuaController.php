<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Regency;
use App\District;
use App\User;
use App\Student;
use App\Orangtua;
use App\LogActivity;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function registration()
    {
        $provinces = Province::all()->sortBy('name');
        $regencies = Regency::all()->sortBy('name');
        $districts = District::all()->sortBy('name');
        $ortu = User::where('id', Auth::user()->id)->with('orangtua')->first();
        // dd($ortu);
        return view('orangtua.registration', compact('provinces','regencies','districts', 'ortu'));
    }

    public function report(Request $request)
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        // $siswa = User::where('type', 'Siswa')->whereHas('student', function ($query) use($ortu) {
        //     $query->where('orangtua_id', $ortu->id);
        // })->with(['student' => function($query) use($ortu)
        // {
        //     $query->where('orangtua_id', $ortu->id);
        // }])->with('logActivity')->get();
        $siswa = $ortu->student->pluck('user_id');
        $activities = LogActivity::whereIn('user_id', $siswa)->with('user.student')->get();
        // dd($activity);

        return view('orangtua.report',compact('activities'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function index2(Request $request)
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        $siswa = Student::where('orangtua_id', $ortu->id)->get();
        // dd($ortu->id);
        return view('orangtua.index',compact('siswa'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function profil(){
        // $value = User::find($id);
        $title = 'Data Orang Tua';
       return view('orangtua.profil', compact('title'));
       // return view('orangtua.profil', compact('ortu'));
    }

    public function updateProfil(Request $request){
        $this->validate($request, [
                 'name'          => 'required',
                 'username'      => 'required',
                 'email'         => 'required',
                 'password'      => 'required',
           ],

           [
                'name.required'          => 'Nama harus diisi!',
                'username.required'      => 'Username harus diisi!',
                'email.required'         => 'Email harus diisi!',
                'password.required'      => 'Password harus diisi!',
            ]

       );

       $ortu = Orangtua::where('id',$id)->first();
       $ortu->name=$request->name;
       $ortu->username=$request->username;
       $ortu->email=$request->email;
       $ortu->password=$request->password;
       $ortu->save();

       Alert::success('Sukses', 'Profil berhasil diubah!');

       return redirect()->route('orangtua.dashboard');
       // return view('orangtua.profil', compact('ortu'));
    }

    public function index()
    {
        // api berita

        $curl = curl_init();

        $query = http_build_query([
            'q'         => "siswa berprestasi",
            'apiKey'    => "6a385e9bf2374b8692bb204204c394ee",
            'sortBy'    => "publishedAt"
        ]);
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://newsapi.org/v2/everything?".$query,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response, true); //because of true, it's in an array
        // dd($response);
        return view('orangtua.dashboard', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Student::all();
        $ortu = User::where('id', Auth::user()->id)->with('orangtua')->first();
        $provinces = Province::all()->sortBy('name');
        $regencies = Regency::all()->sortBy('name');
        $districts = District::all()->sortBy('name');
        return view('orangtua.create_registration', compact('siswa', 'ortu','provinces','regencies','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                 'name'          => 'required',
                 'jenis_kelamin' => 'required',
                 'username'      => 'required',
                 'email'         => 'required',
                 'password'      => 'required',
                 'orangtua_id'   => 'required',
                 'province_id'   => 'required',
                 'regency_id'    => 'required',
                 'district_id'   => 'required',
                 'school_name'   => 'required',
                 'class'         => 'required',
           ],

           [
                'name.required'          => 'Nama harus diisi!',
                'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                'username.required'      => 'Username harus diisi!',
                'email.required'         => 'Email harus diisi!',
                'password.required'      => 'Password harus diisi!',
                'orangtua_id.required'   => 'Id orangtua harus diisi!',
                'province_id.required'   => 'Provinsi harus diisi!',
                'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                'district_id.required'   => 'Kecamatan harus diisi!',
                'school_name.required'   => 'Sekolah harus diisi!',
                'class.required'         => 'Kelas harus diisi!',
            ]

       );

        $user = User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'type'          => 'Siswa',
        ])->student()->create([
            'jenis_kelamin' => $request->jenis_kelamin,
            'orangtua_id'   => $request->orangtua_id,
            'province_id'   => $request->province_id,
            'regency_id'    => $request->regency_id,
            'district_id'   => $request->district_id,
            'school_name'   => $request->school_name,
            'class'         => $request->class,
        ]);

        Alert::success('Sukses', 'Akun anak berhasil ditambahkan!');

        return redirect()->route('orangtua.registration.index2');
        // return redirect()->route('orangtua.registration.detail',['id'=>$user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        $user = User::where('id',$id)->with('student')->first();
           // dd($user);
        $siswa = Student::find($id);
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        return view('orangtua.detail_registration', compact('user','ortu','siswa','provinces','regencies','districts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Student::find($id);
        $ortu = User::where('id', Auth::user()->id)->with('orangtua')->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        return view('orangtua.edit_registration', compact('siswa','provinces','regencies','districts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                 'name'          => 'required',
                 'jenis_kelamin' => 'required',
                 'username'      => 'required',
                 'email'         => 'required',
                 'password'      => 'required',
                 // 'orangtua_id'   => 'required',
                 'province_id'   => 'required',
                 'regency_id'    => 'required',
                 'district_id'   => 'required',
                 'school_name'   => 'required',
                 'class'         => 'required',
           ],

           [
                'name.required'          => 'Nama harus diisi!',
                'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                'username.required'      => 'Username harus diisi!',
                'email.required'         => 'Email harus diisi!',
                'password.required'      => 'Password harus diisi!',
                'orangtua_id.required'   => 'Id orangtua harus diisi!',
                'province_id.required'   => 'Provinsi harus diisi!',
                'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                'district_id.required'   => 'Kecamatan harus diisi!',
                'school_name.required'   => 'Sekolah harus diisi!',
                'class.required'         => 'Kelas harus diisi!',
            ]

       );

       $siswa = Student::find($id);
       $user = User::find($siswa->user_id);
       $user->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'type'          => 'Siswa',
        ]);

        $user->student()->update([
            'jenis_kelamin' => $request->jenis_kelamin,
            'province_id'   => $request->province_id,
            'regency_id'    => $request->regency_id,
            'district_id'   => $request->district_id,
            'school_name'   => $request->school_name,
            'class'         => $request->class,
        ]);

        $siswa->save();

        Alert::success('Sukses', 'Akun anak berhasil diubah!');

        return redirect()->route('orangtua.registration.index2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Student::where('id',$id)->first();
        $siswa->user->delete();
        return redirect()->route('orangtua.registration.index2');
    }
}
