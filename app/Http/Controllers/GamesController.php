<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\GameCategory;
use App\ModelFile;

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
        // dd($games);
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
       $this->validate($request, [
             'name'          => 'required',
             'gamecategories_id'      => 'required',
             'image'         => 'required',
             'description'   => 'required',
             'url'           => 'required',
       ]);


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
           // dd($games);
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
        $this->validate($request, [
              'name'          => 'required',
              'gamecategories_id'      => 'required',
              'image'         => 'required',
              'description'   => 'required',
              'url'           => 'required',
        ]);

        $games = Game::where('id',$id)->first();
        $games->name  = $request->name;
        $games->gamecategories_id = $request->gamecategories_id;
        $games->description = $request->description;
        $games->url   = $request->url;
        $games->save();
        return redirect()->route('admin.minigames')->with('alert-success','Data berhasil diubah!');

        // $games = Game::find($id);
        // Game::update([
        //     'name'        => $request->name,
        //     'level'       => $request->level,
        //     'image'       => $request->image,
        //     'description' => $request->description,
        //     'url'         => $request->url
        // ]);
        //
        // // redirect menggunakan url lengkap sedangkan route menggunakan route name
        // return redirect()->route('admin.minigames');
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
         return redirect()->route('admin.minigames')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function getGames() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $games = Game::all(); // untuk mengambil semua data games
        return response()->json([
            'status' => 'success',
            'result' => $games
        ]);
    }
}
