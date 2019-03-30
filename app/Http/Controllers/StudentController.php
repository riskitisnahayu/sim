<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\GameCategory;
use App\EBook;
use App\SubjectsCategory;
use App\LogActivity;
use App\TaskMaster;
use App\Student;
use Auth;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function profil()
     {
         $siswa = Student::where('user_id', Auth::user()->id)->first();
         return view('student.profil_detail', compact('siswa'));
     }

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
         // dd($ebooks);
         $subjectscategories = SubjectsCategory::all();
         return view('student.ebook', compact('ebooks','subjectscategories'));
     }

     public function bankSoal(Request $request){
         LogActivity::create([
             'user_id' => Auth::user()->id,
             'fitur'   => 'Bank Soal'
         ]);

         // if ($request->subjectscategories_id && $request->title && $request->class && $request->semester) {
         //     $task_masters = TaskMaster::where([
         //         ['subjectscategories_id', $request->subjectscategories_id],
         //         ['title', $request->title],
         //         ['class', $request->class],
         //         ['semester', $request->semester],
         //         ])->get();
         // } elseif ($request->subjectscategories_id && $request->title) {
         //     $task_masters = TaskMaster::where([
         //         ['subjectscategories_id', $request->subjectscategories_id],
         //         ['title', $request->title],
         //         ])->get();
         // } elseif ($request->subjectscategories_id && $request->class) {
         //     $task_masters = TaskMaster::where([
         //         ['subjectscategories_id', $request->subjectscategories_id],
         //         ['class', $request->class],
         //         ])->get();
         // } elseif ($request->subjectscategories_id && $request->semester) {
         //     $task_masters = TaskMaster::where([
         //         ['subjectscategories_id', $request->subjectscategories_id],
         //         ['semester', $request->semester],
         //         ])->get();
         // }  elseif ($request->title && $request->class) {
         //    $task_masters = TaskMaster::where([
         //        ['title', $request->title],
         //        ['class', $request->class],
         //        ])->get();
         // } elseif ($request->title && $request->semester) {
         //   $task_masters = TaskMaster::where([
         //        ['title', $request->title],
         //        ['semester', $request->semester],
         //        ])->get();
         // } elseif ($request->class && $request->semester) {
         //    $task_masters = TaskMaster::where([
         //        ['class', $request->class],
         //        ['semester', $request->semester],
         //        ])->get();
         // } else if($request->subjectscategories_id) {
         //    $task_masters = TaskMaster::where('subjectscategories_id', $request->subjectscategories_id)->get();
         // } else if ($request->title) {
         //     $task_masters = TaskMaster::where('title', $request->title)->get();
         // } else if ($request->class) {
         //     $task_masters = TaskMaster::where('class', $request->class)->get();
         // } else if ($request->semester) {
         //     $task_masters = TaskMaster::where('semester', $request->semester)->get();
         // }else {
         //     $task_masters = TaskMaster::all();
         // }

         if ($request->subjectscategories_id) {
             $task_masters = TaskMaster::where('subjectscategories_id', $request->subjectscategories_id)->get();
         } else {
             $task_masters = TaskMaster::all();
         }

         $subjectscategories = SubjectsCategory::all();
         // dd($task_masters);
         return view('student.banksoal', compact('task_masters','subjectscategories'));
     }

     public function soal(Request $request)
     {
         // dd($request);
         // $task_master = TaskMaster::find($id);
         // $tasks = TaskMaster::where('id', $id)->first()->tasks()->get();
         $task_master_id = $request->title;
         $task_master = TaskMaster::find($task_master_id);
         $tasks = TaskMaster::where('id', $task_master_id)
                                ->where('class', $request->class)
                                ->where('semester', $request->semester)
                                ->first();
         if($tasks){
             $tasks = TaskMaster::where('id', $task_master_id)
                                    ->where('class', $request->class)
                                    ->where('semester', $request->semester)
                                    ->first()->tasks()->get();
         } else{
             return redirect()->back()->with('error','Maaf, Soal tidak tersedia.');
         }
         $answers = [];
         foreach ($tasks as $key => $curr_task) {
             $answers[$key] = $curr_task->answers()->orderBy('choice', 'asc')->get();
         }
         // dd($tasks);
         // dd($answers);
         $choices = ['a', 'b', 'c', 'd'];
         // $taskmaster_id = $id;
        $taskmaster_id = $task_master_id;
         // dd($taskmaster_id);

         return view('student.soal', compact('task_master','tasks','answers','choices','taskmaster_id'));
     }

    public function soalResult()
    {
        // dd($request);
        return view('student.soal_result');
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

    // API
    public function api_getSiswa(Request $request) // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $user = User::where('id',$request->id)
               ->with('student')
               ->first(); // untuk mengambil semua data games

        return response()->json([
            // 'user_id' => Auth::user()->id,
            'error' => false,
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function api_soal(Request $request)
    {
        // dd($request);
        // $task_master = TaskMaster::find($id);
        // $tasks = TaskMaster::where('id', $id)->first()->tasks()->get();
        $task_master_id = $request->id;
        $task_master = TaskMaster::find($task_master_id);
        $tasks = TaskMaster::where('id', $task_master_id)
                               ->where('class', $request->class)
                               ->where('semester', $request->semester)
                               ->first();
        if($tasks){
            $tasks = TaskMaster::where('id', $task_master_id)
                                   ->where('class', $request->class)
                                   ->where('semester', $request->semester)
                                   ->first()->taskanswers()->get(); //answers karena di function model diberi nama answers
        }
        // else{
        //     return redirect()->back()->with('error','Maaf, Soal tidak tersedia.');
        // }
        $answers = [];
        // dd($tasks);
        foreach ($tasks as $key => $curr_task) {
            $answers[$key] = $curr_task->answers()->orderBy('choice', 'asc')->get();
        }
        // dd($answers);
        $choices = ['a', 'b', 'c', 'd'];
        // $taskmaster_id = $id;
       $taskmaster_id = $task_master_id;
        // dd($taskmaster_id);

        return response()->json([
            'error'  => false,
            'status' => 'success',
            'result' => $task_master,
            'soal'   => $tasks
        ]);
    }

    public function api_detailProfil(Request $request)
    {
        $user = User::where('id',$request->id) //user dimana id nya = request-nya (request id-nya)
        ->with('student') // fungsi students yang ada di model User
        ->first();
        return response()->json([
            'error'  => false,
            'status' => 'success',
            'result' => $user
        ]);
    }
}
