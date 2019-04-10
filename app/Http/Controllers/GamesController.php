<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\GameCategory;
use App\ModelFile;
use App\LogActivity;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;


class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) // untuk dashboard/halaman2 awal &&&& return view ditaruh di index aja
    {
        $games = Game::all();
        $gamecategories = GameCategory::all();
        return view('admin.admin_games', compact('games','gamecategories'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // untuk menampilkan form tmbah data
    {
        $gamecategories = GameCategory::all();
        return view('admin.games_add',compact('gamecategories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // untuk menghandel form tambah data
    {

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
            'name'          => 'required|max:190',
            'gamecategories_id'      => 'required',
            'image'         => 'required',
            'description'   => 'required|max:190',
            'url'           => 'required|regex:' . $regex,
       ],

       [
           'name.required'     => 'Nama harus diisi!',
           'name.max'          => 'Nama terlalu panjang!',
           'gamecategories_id.required'   => 'Kategori harus diisi!',
           'image.required'         => 'Gambar harus diisi!',
           'description.required'   => 'Deskripsi harus diisi!',
           'description.max'   => 'Deskripsi terlalu panjang!',
           'url.required'      => 'Url harus diisi!',
           'url.regex'         => 'Format url tidak valid!',

       ]
    );


       $games = new Game();
       $games->name=$request->name;
       $games->gamecategories_id=$request->gamecategories_id;
       $games->description=$request->description;
       $games->url=$request->url;

       $image   = $request->file('image');
       $ext     = $image->getClientOriginalExtension();
       $newName = rand(100000,1001238912).".".$ext;
       $image->move('images',$newName);
       $games->image = $newName;
       $games->save();

       Alert::success('Sukses', 'Mini games berhasil ditambahkan!');
        // redirect menggunakan url lengkap sedangkan route menggunakan route name
        return redirect()->route('admin.minigames');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // untuk menampilkan/ melihat data
    {
        $games = Game::find($id);
        $gamecategories = GameCategory::all();
        return view('admin.games_detail', compact('games','gamecategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // untuk menampilkan form untuk edit data
    {
        $games = Game::find($id);
        $gamecategories = GameCategory::all();
        return view('admin.games_edit', compact('games','gamecategories'));
    }
    // compact == untuk push data ke view
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // untuk menghandel form edit data
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
            'name'          => 'required|max:190',
            'gamecategories_id'      => 'required',
            'description'   => 'required|max:190',
            'url'           => 'required|regex:' . $regex,
        ],

        [
            'name.required'     => 'Nama harus diisi!',
            'name.max'          => 'Nama terlalu panjang!',
            'gamecategories_id.required'    => 'Kategori harus diisi!',
            'description.required'          => 'Deskripsi harus diisi!',
            'description.max'   => 'Deskripsi terlalu panjang!',
            'url.required'      => 'Url harus diisi!',
            'url.regex'         => 'Format url tidak valid!',
        ]
    );

        $games = Game::where('id',$id)->first();
        $games->name  = $request->name;
        $games->gamecategories_id = $request->gamecategories_id;
        $games->description = $request->description;
        $games->url   = $request->url;

        if (!empty($request->file('image')))
        {
            $image   = $request->file('image');
            $ext     = $image->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $image->move('images',$newName);
            $games->image = $newName;
        }
        $games->save();

        Alert::success('Sukses', 'Mini games berhasil diubah!');

        return redirect()->route('admin.minigames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // delete
    {
         $games = Game::where('id',$id)->first();
         $games->delete();
         return redirect()->route('admin.minigames');
    }

    public function api_getGames() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        LogActivity::create([
            'user_id' => Auth::user()->id,
            'fitur'   => 'Mini Games'
        ]);

        $games = Game::all(); // untuk mengambil semua data games
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $games
        ]);
    }

    public function api_show($id)
    {
        $games = Game::find($id);
        return response()->json([  //biar keluarannya berupa json
            'error' => false,
            'status' => 'success',
            'result' => $games
        ]);
    }
}
