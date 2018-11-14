<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // untuk dashboard/halaman2 awal &&&& return view ditaruh di index aja
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // untuk menampilkan form tmbah data
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // untuk menghandel form tambah data
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // untuk menampilkan/ melihat data
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // untuk menampilkan form untuk edit data
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
    public function update(Request $request, $id) // untuk menghandel form edit data
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // delete
    {
        //
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
