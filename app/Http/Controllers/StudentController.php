<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\GameCategory;
use App\EBook;
use App\SubjectsCategory;
use App\LogActivity;
use App\TaskMaster;
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
         if ($request->subjectscategories_id && $request->class && $request->semester) {
             $ebooks = EBook::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['class', $request->class],
                 ['semester', $request->semester],
                 ])->get();

         }  else if($request->subjectscategories_id  && $request->class) {
             $ebooks = EBook::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['class', $request->class],
             ])->get();
         } else if($request->subjectscategories_id  && $request->semester) {
             $ebooks = EBook::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['semester', $request->semester],
             ])->get();
         } else if($request->class  && $request->semester) {
             $ebooks = EBook::where([
                 ['class', $request->class],
                 ['semester', $request->semester],
             ])->get();
         } else if($request->subjectscategories_id) {
             $ebooks = EBook::where('subjectscategories_id', $request->subjectscategories_id)->get();
         } else if ($request->class) {
             $ebooks = EBook::where('class', $request->class)->get();
         } else if ($request->semester) {
             $ebooks = EBook::where('semester', $request->semester)->get();
         } else {
             $ebooks = EBook::all();
         }
         $subjectscategories = SubjectsCategory::all();
         return view('student.ebook', compact('ebooks','subjectscategories'));
     }

     public function bankSoal(Request $request){
         LogActivity::create([
             'user_id' => Auth::user()->id,
             'fitur'   => 'Bank Soal'
         ]);

         if ($request->subjectscategories_id && $request->title && $request->class && $request->semester) {
             $task_masters = TaskMaster::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['title', $request->title],
                 ['class', $request->class],
                 ['semester', $request->semester],
                 ])->get();

         } elseif ($request->subjectscategories_id && $request->title) {
             $task_masters = TaskMaster::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['title', $request->title],
                 ])->get();
         } elseif ($request->subjectscategories_id && $request->class) {
             $task_masters = TaskMaster::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['class', $request->class],
                 ])->get();
         } elseif ($request->subjectscategories_id && $request->semester) {
             $task_masters = TaskMaster::where([
                 ['subjectscategories_id', $request->subjectscategories_id],
                 ['semester', $request->semester],
                 ])->get();
         }  elseif ($request->title && $request->class) {
            $task_masters = TaskMaster::where([
                ['title', $request->title],
                ['class', $request->class],
                ])->get();
         } elseif ($request->title && $request->semester) {
           $task_masters = TaskMaster::where([
                ['title', $request->title],
                ['semester', $request->semester],
                ])->get();
         } elseif ($request->class && $request->semester) {
            $task_masters = TaskMaster::where([
                ['class', $request->class],
                ['semester', $request->semester],
                ])->get();
         } else if($request->subjectscategories_id) {
            $task_masters = TaskMaster::where('subjectscategories_id', $request->subjectscategories_id)->get();
         } else if ($request->title) {
             $task_masters = TaskMaster::where('title', $request->title)->get();
         } else if ($request->class) {
             $task_masters = TaskMaster::where('class', $request->class)->get();
         } else if ($request->semester) {
             $task_masters = TaskMaster::where('semester', $request->semester)->get();
         }else {
             $task_masters = TaskMaster::all();
         }
         $subjectscategories = SubjectsCategory::all();
         return view('student.banksoal', compact('task_masters','subjectscategories'));
     }

     //chained tampilan judul di bank soal siswa
    public function title()
    {
        $subjectscategories = Input::get('id');
        $task_masters = TaskMaster::where('subjectscategories_id','=', $subjectscategories)->get();
        return response()->json($task_masters);
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
