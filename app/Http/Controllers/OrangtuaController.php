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
use App\StudentTask;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Hash;

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
        return view('orangtua.registeration', compact('provinces','regencies','districts', 'ortu'));
    }

    public function studentActivity(Request $request)
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        $siswa = $ortu->student->pluck('user_id');
        $activities = LogActivity::whereIn('user_id', $siswa)->with('user.student')->orderBy('user_id', 'desc')->get();

        return view('orangtua.student_activity',compact('activities'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function studentResult(Request $request)
    {
        $ortu = Auth::user()->orangtua->id;
        // $studenttask = StudentTask::whereHas('student', function($siswa) use($ortu){
        //     $siswa->where('orangtua_id',$ortu)->get();
        // })->with('student_tasks.taskmaster_id','taskmaster.id')->get();
        //$siswa = Student::where('orangtua_id',$ortu)->get();
        $ortu = Orangtua::find($ortu);
        $siswa = Student::where('orangtua_id',$ortu->id)->get();
        $studenttask = $ortu->studenttask()->get();

        return view('orangtua.student_result',compact('studenttask'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function index2(Request $request)
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        $siswa = Student::where('orangtua_id', $ortu->id)->get();
        return view('orangtua.index',compact('siswa'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function detailProfil()
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        return view('orangtua.profil_detail',compact('ortu'));
    }

    public function editProfil()
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        return view('orangtua.profil_edit',compact('ortu'));
    }

    public function updateProfil(Request $request){
        $data = Orangtua::where('user_id', Auth::user()->id)->first();
        $ortu = User::where('id',$data->user_id)->first();

        if ($request->username == $ortu->username && $request->email == $ortu->email) {
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
        }elseif ($request->username != $ortu->username && $request->email == $ortu->email) {
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
        }elseif ($request->username == $ortu->username && $request->email != $ortu->email) {
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
        }elseif ($request->username != $ortu->username && $request->email != $ortu->email) {
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

       $ortu->name=$request->name;
       $ortu->username=$request->username;
       $ortu->email=$request->email;
       $ortu->save();

       Alert::success('Sukses', 'Data orang tua berhasil diubah!');

       return redirect()->route('orangtua.profil.detail');
    }

    public function editPassword()
    {
        $ortu = Orangtua::where('user_id', Auth::user()->id)->first();
        return view('orangtua.profil_password',compact('ortu'));
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
                   'password.min'                    => 'Password minimal 6 karakter!',
                   'password.confirmed'              => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                ]
            );
           $data->save();

            Alert::success('Sukses', 'Password berhasil diubah!');
            return redirect()->route('orangtua.profil.detail');

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
                 'name'          => 'required|max:191',
                 'jenis_kelamin' => 'required',
                 'username'      => 'required|unique:users|max:191',
                 'email'         => 'required|unique:users|email|max:191',
                 'password'      => 'required|min:6',
                 'orangtua_id'   => 'required',
                 'province_id'   => 'required',
                 'regency_id'    => 'required',
                 'district_id'   => 'required',
                 'school_name'   => 'required|max:255',
                 'class'         => 'required',
           ],

           [
                'name.required'          => 'Nama harus diisi!',
                'name.max'               => 'Nama terlalu panjang!',
                'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                'username.required'      => 'Username harus diisi!',
                'username.unique'        => 'Username sudah terpakai!',
                'username.max'           => 'Username terlalu panjang!',
                'email.required'         => 'Email harus diisi!',
                'email.unique'           => 'Email sudah terpakai!',
                'email.email'            => 'Format email tidak valid!',
                'email.max'              => 'Email terlalu panjang!',
                'password.required'      => 'Password harus diisi!',
                'password.min'           => 'Password minimal 6 karakter!',
                'orangtua_id.required'   => 'Id orangtua harus diisi!',
                'province_id.required'   => 'Provinsi harus diisi!',
                'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                'district_id.required'   => 'Kecamatan harus diisi!',
                'school_name.required'   => 'Nama sekolah harus diisi!',
                'school_name.max'        => 'Nama sekolah terlalu panjang!',
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

        return redirect()->route('orangtua.registeration.index2');
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
        $siswa = Student::where('id',$id)->first();
        $data = User::where('id',$siswa->user_id)->first();
        if ($request->username == $data->username && $request->email == $data->email) {
            $this->validate($request, [
                     'name'          => 'required|max:191',
                     'jenis_kelamin' => 'required',
                     'username'      => 'required|max:191',
                     'email'         => 'required|email|max:191',
                     // 'password'      => 'required',
                     // 'orangtua_id'   => 'required',
                     'province_id'   => 'required',
                     'regency_id'    => 'required',
                     'district_id'   => 'required',
                     'school_name'   => 'required|max:255',
                     'class'         => 'required',
               ],

               [
                    'name.required'          => 'Nama harus diisi!',
                    'name.max'               => 'Nama terlalu panjang!',
                    'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                    'username.required'      => 'Username harus diisi!',
                    'username.max'           => 'Username terlalu panjang!',
                    'email.required'         => 'Email harus diisi!',
                    'email.email'            => 'Format email tidak valid!',
                    'email.max'              => 'Email terlalu panjang!',
                    // 'password.required'      => 'Password harus diisi!',

                    'orangtua_id.required'   => 'Id orangtua harus diisi!',
                    'province_id.required'   => 'Provinsi harus diisi!',
                    'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                    'district_id.required'   => 'Kecamatan harus diisi!',
                    'school_name.required'   => 'Nama sekolah harus diisi!',
                    'school_name.max'        => 'Nama sekolah terlalu panjang!',
                    'class.required'         => 'Kelas harus diisi!',
                ]

           );
        }elseif ($request->username != $data->username && $request->email == $data->email) {
            $this->validate($request, [
                     'name'          => 'required|max:191',
                     'jenis_kelamin' => 'required',
                     'username'      => 'required|unique:users|max:191',
                     'email'         => 'required|email|max:191',
                     // 'password'      => 'required',
                     // 'orangtua_id'   => 'required',
                     'province_id'   => 'required',
                     'regency_id'    => 'required',
                     'district_id'   => 'required',
                     'school_name'   => 'required|max:255',
                     'class'         => 'required',
               ],

               [
                    'name.required'          => 'Nama harus diisi!',
                    'name.max'               => 'Nama terlalu panjang!',
                    'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                    'username.required'      => 'Username harus diisi!',
                    'username.unique'        => 'Username sudah terpakai!',
                    'username.max'           => 'Username terlalu panjang!',
                    'email.required'         => 'Email harus diisi!',
                    // 'email.unique'           => 'Email sudah terpakai!',
                    'email.email'            => 'Format email tidak valid!',
                    'email.max'              => 'Email terlalu panjang!',
                    // 'password.required'      => 'Password harus diisi!',

                    'orangtua_id.required'   => 'Id orangtua harus diisi!',
                    'province_id.required'   => 'Provinsi harus diisi!',
                    'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                    'district_id.required'   => 'Kecamatan harus diisi!',
                    'school_name.required'   => 'Nama sekolah harus diisi!',
                    'school_name.max'        => 'Nama sekolah terlalu panjang!',
                    'class.required'         => 'Kelas harus diisi!',
                ]

           );
        }elseif ($request->username == $data->username && $request->email != $data->email) {
            $this->validate($request, [
                     'name'          => 'required|max:191',
                     'jenis_kelamin' => 'required',
                     'username'      => 'required|max:191',
                     'email'         => 'required|unique:users|email|max:191',
                     // 'password'      => 'required',
                     // 'orangtua_id'   => 'required',
                     'province_id'   => 'required',
                     'regency_id'    => 'required',
                     'district_id'   => 'required',
                     'school_name'   => 'required|max:255',
                     'class'         => 'required',
               ],

               [
                    'name.required'          => 'Nama harus diisi!',
                    'name.max'               => 'Nama terlalu panjang!',
                    'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                    'username.required'      => 'Username harus diisi!',
                    'username.max'           => 'Username terlalu panjang!',
                    'email.required'         => 'Email harus diisi!',
                    'email.unique'           => 'Email sudah terpakai!',
                    'email.email'            => 'Format email tidak valid!',
                    'email.max'              => 'Email terlalu panjang!',
                    // 'password.required'      => 'Password harus diisi!',

                    'orangtua_id.required'   => 'Id orangtua harus diisi!',
                    'province_id.required'   => 'Provinsi harus diisi!',
                    'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                    'district_id.required'   => 'Kecamatan harus diisi!',
                    'school_name.required'   => 'Nama sekolah harus diisi!',
                    'school_name.max'        => 'Nama sekolah terlalu panjang!',
                    'class.required'         => 'Kelas harus diisi!',
                ]

           );
        }elseif ($request->username != $data->username && $request->email != $data->email) {
            $this->validate($request, [
                     'name'          => 'required|max:191',
                     'jenis_kelamin' => 'required',
                     'username'      => 'required|unique:users|max:191',
                     'email'         => 'required|unique:users|email|max:191',
                     // 'password'      => 'required',
                     // 'orangtua_id'   => 'required',
                     'province_id'   => 'required',
                     'regency_id'    => 'required',
                     'district_id'   => 'required',
                     'school_name'   => 'required|max:255',
                     'class'         => 'required',
               ],

               [
                    'name.required'          => 'Nama harus diisi!',
                    'name.max'               => 'Nama terlalu panjang!',
                    'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
                    'username.required'      => 'Username harus diisi!',
                    'username.unique'        => 'Username sudah terpakai!',
                    'username.max'           => 'Username terlalu panjang!',
                    'email.required'         => 'Email harus diisi!',
                    'email.unique'           => 'Email sudah terpakai!',
                    'email.email'            => 'Format email tidak valid!',
                    'email.max'              => 'Email terlalu panjang!',
                    // 'password.required'      => 'Password harus diisi!',

                    'orangtua_id.required'   => 'Id orangtua harus diisi!',
                    'province_id.required'   => 'Provinsi harus diisi!',
                    'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                    'district_id.required'   => 'Kecamatan harus diisi!',
                    'school_name.required'   => 'Nama sekolah harus diisi!',
                    'school_name.max'        => 'Nama sekolah terlalu panjang!',
                    'class.required'         => 'Kelas harus diisi!',
                ]

           );
        }

       // dd($data);
       if ($request->oldPassword != null) {
           // $data->password = Hash::make($request->oldPassword);
           // $data->save();

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
                       'password.min'                    => 'Password baru minimal 6 karakter!',
                       'password.confirmed'              => 'Konfirmasi password tidak sesuai!',
                       'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                    ]
                );
               $data->save();
               // return "ha";
           }
           else {
                   $this->validate($request, [
                        'oldPassword'           => 'required',
                        'password'              => 'required|min:6|confirmed',
                        'password_confirmation' => 'required',
                  ],
                  [
                      'oldPassword.required'            => 'Password lama harus diisi!',
                      'password.required'               => 'Password baru harus diisi!',
                      'password.min'                    => 'Password baru minimal 6 karakter!',
                      'password.confirmed'              => 'Konfirmasi password tidak sesuai!',
                      'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                   ]
               );
               return redirect()->back()->with('error','Password tidak sesuai!');
               // return "hi";
           }
           // dd(Hash::check('123456', $data->password));

       }

       $siswa = Student::find($id);
       $user = User::find($siswa->user_id);
       $user->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            // 'password'      => bcrypt($request->password),
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

        return redirect()->route('orangtua.registeration.index2');
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
        return redirect()->route('orangtua.registeration.index2');
    }

    // API
    public function api_getOrangtua(Request $request)
    {

        $user = User::where('id',$request->id) //user dimana id nya = request-nya (request id-nya)
        ->with('orangtua') // fungsi orangtua yang ada di model User
        ->first(); // untuk mengambil satu data ortu

        $siswa = Student::leftJoin('orangtuas','students.orangtua_id','orangtuas.id') // yang dipanggil orangtua id karena di dua tabel yang menghubungkan adalah orang tua id-nya.
                           ->leftJoin('users','students.user_id','users.id') // di tabel users yang mengubungakan dengan tabel students adalah user_id
                           ->where('orangtuas.user_id', $request->id) // dimana tabel orang tua berdasarkan user_id diambil berdasarkan id yang di request
                           ->get(); // sehingga ini mengambil satu data dari orang tua
        // $siswa = Orangtua::where('user_id', $request->id)->get();
        // dd($siswa);

        return response()->json([
            // 'user_id' => Auth::user()->id,
            'error' => false,
            'status' => 'success',
            'result' => $user,
            'anak' => $siswa

        ]);
    }

    public function api_getNews()
    {
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
        // return view('orangtua.dashboard', compact('response'));
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $response
        ]);
    }

    public function api_detailProfil(Request $request)
    {
        $user = User::where('id',$request->id) //user dimana id nya = request-nya (request id-nya)
        ->with('orangtua') // fungsi orangtua yang ada di model User
        ->first(); // untuk mengambil satu data ortu
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function api_updateProfil(Request $request, $id){
        $this->validate($request, [
                 'name'          => 'required',
                 'username'      => 'required',
                 'email'         => 'required|email',
           ],

           [
                'name.required'          => 'Nama harus diisi!',
                'username.required'      => 'Username harus diisi!',
                'email.required'         => 'Email harus diisi!',
            ]
       );
       $data = Orangtua::where('user_id', $id)->first(); //dimana user_id itu nama kolom di tabel ortu, dan diambil id dari tabel ortu
       $ortu = User::where('id',$data->user_id)->first();
       $ortu->name=$request->name;
       $ortu->username=$request->username;
       $ortu->email=$request->email;
       $ortu->save();
       return response()->json([
           'error' => false,
           'status' => 'success',
           'result' => $ortu
       ]);
    }

    public function api_updatePasswOrtu(Request $request,$id)
    {
        $data = Orangtua::where('user_id',$id)->first();
        $ortu = User::where('id',$data->user_id)->first();
        if (Hash::check($request->oldPassword, $ortu->password))
        {
            $this->validate($request, [
                     'oldPassword'           => 'required',
                     'password'              => 'required|min:6|confirmed',
                     'password_confirmation' => 'required',
               ],
               [
                   'oldPassword.required'            => 'Password lama harus diisi!',
                   'password.required'               => 'Password baru harus diisi!',
                   'password.min'                    => 'Password baru minimal 6 karakter!',
                   'password.confirmed'              => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                ]
            );
            $ortu->password = Hash::make($request->password);
            $ortu->save();
        }
        else {
            $this->validate($request, [
                     'oldPassword'           => 'required',
                     'password'              => 'required|min:6|confirmed',
                     'password_confirmation' => 'required',
               ],
               [
                   'oldPassword.required'           => 'Password lama harus diisi!',
                   'password.required'              => 'Password baru harus diisi!',
                   'password.min'                   => 'Password baru minimal 6 karakter!',
                   'password.confirmed'             => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required' => 'Konfirmasi password baru harus diisi!',
                ]
            );
        }
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $ortu
        ]);
    }

    public function api_updatePasswSiswa(Request $request, $id)
    {
        $data = Student::where('user_id',$id)->first();
        $siswa = User::where('id',$data->user_id)->first();
        if (Hash::check($request->oldPassword, $siswa->password))
        {
            $this->validate($request, [
                     'oldPassword'           => 'required',
                     'password'              => 'required|min:6|confirmed',
                     'password_confirmation' => 'required',
               ],
               [
                   'oldPassword.required'            => 'Password lama harus diisi!',
                   'password.required'               => 'Password baru harus diisi!',
                   'password.min'                    => 'Password baru minimal 6 karakter!',
                   'password.confirmed'              => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                ]
            );
            $siswa->password = Hash::make($request->password);
            $siswa->save();
        }else {
            $this->validate($request, [
                     'oldPassword'           => 'required',
                     'password'              => 'required|min:6|confirmed',
                     'password_confirmation' => 'required',
               ],
               [
                   'oldPassword.required'            => 'Password lama harus diisi!',
                   'password.required'               => 'Password baru harus diisi!',
                   'password.min'                    => 'Password baru minimal 6 karakter!',
                   'password.confirmed'              => 'Konfirmasi password tidak sesuai!',
                   'password_confirmation.required'  => 'Konfirmasi password baru harus diisi!',
                ]
            );
        }
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $siswa
        ]);
    }
}
