<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\GameCategory;
use App\EBook;
use App\SubjectsCategory;
use App\LogActivity;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function games(Request $request)
     {
         LogActivity::create([
             'user_id' => Auth::user()->id,
             'fitur'   => 'Mini Games'
         ]);
         if ($request->gamecategories_id) {
             $games = Game::where('gamecategories_id', $request->gamecategories_id)->get();
         } else {
             $games = Game::all();
         }
         // dd($games);
         $gamecategories = GameCategory::all();
         return view('student.games', compact('games','gamecategories'));
     }

     public function ebooks(Request $request){
         LogActivity::create([
             'user_id' => Auth::user()->id,
             'fitur'   => 'E-Book'
         ]);
         if ($request->subjectscategories_id && $request->class) {
             $ebooks = EBook::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['class', $request->class],
                 ])->get();

         } else if($request->subjectscategories_id) {
             $ebooks = EBook::where('subjectscategories_id', $request->subjectscategories_id)->get();
         } else if ($request->class) {
             $ebooks = EBook::where('class', $request->class)->get();
         } else {
             $ebooks = EBook::all();
         }
         $subjectscategories = SubjectsCategory::all();
         return view('student.ebook', compact('ebooks','subjectscategories'));
     }

    public function index()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
