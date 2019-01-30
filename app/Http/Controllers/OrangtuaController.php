<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Regency;
use App\District;
use App\User;
use Auth;

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

    public function report()
    {
        return view('orangtua.report');
    }

    public function index()
    {
        return view('orangtua.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orangtua.registration');
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

        return redirect()->route('orangtua.registration.detail',['id'=>$user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->with('student')->first();
           // dd($user);
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        return view('orangtua.detail_registration', compact('user','provinces','regencies','districts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
