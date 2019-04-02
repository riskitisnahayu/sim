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

     // public function saveAnswer()
     // {
     //     $task_masters = TaskMaster::find($request->taskmaster_id);
     //     $tasks = $task_masters->tasks();
     //     $answers = $tasks->answers();
     //     dd($answers);
     // }

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

        //  timeout harus dalam menit
         $nowTime = date("Y-m-d H:i:s"); //waktu sekarang
         $addMinute = date("Y-m-d H:i:s", strtotime('+ 0 hours + '. $task_master->timeout .'minutes',strtotime($nowTime))); //waktu sekarang + waktu database
         $date = date_create($addMinute); //addminute di date create biar bisa diformat sesuai format yang ntar di javascriptnya
         $endTime = date_format($date,'M, d, Y h:i:s A');

         return view('student.soal', compact('endTime','task_master','tasks','answers','choices','taskmaster_id'));
     }

    public function soalResult(Request $request)
    {
        $x = $request->all(); //ini untuk request form dr bank soal, misal mata pelajaran, title, kelas, dan semester

        $student_id = 'App\Student'::where('user_id',Auth::user()->id)->get()->first();
        $taskmaster_id = $request->taskmaster_id;
        $task_id = 'App\Task'::where('taskmaster_id',$taskmaster_id)->get();

        // $arraychoice = [];
        $is_true = 0; //didefinissin sbg nol. jadi klo siswa ga ngisi, berati nol
        $size = sizeof($x)-2; //ini untuk mengurangi tokrn s, user id. dan yang dicari hny jml jwbn aja. knp jml jwbn? krna baklan ngeload sejumlah jwbn. dan harus nge-loop sebanyak jml jwban

        //buat cek jwbn
        for($i = 1; $i<=10; $i++) //ini untuk soal
        {
             // $jumlah = $i - 1; //
             $iterasi = $task_id->get($i-1)->id; //di iterasi isinya task id sesuai dengan variaabel task id yang diatas buat nunjuk yang pertama bgt sampai yang terakhir berdasarkan index berdasarkan $i.
             //$i - 1 karena menyesuaikan dengan index yang ada di blade, karena dimulai dengan index 0. jadi karena terlanjur menginputkan for = 1, maka harus dikurangi 1, biar dimulai dr 0

             //memperisapkan tempat buat nyimpen
             $aanswer = [ //sblm dimasukin ke db, disimpen dl ke objek dalam bntuk array, kenapa? biar nanti bs diubah, diubahnya dibawah nanti, yaitu di is_true
                  'student_id'      => $student_id->id,
                  'taskmaster_id'   => $request->taskmaster_id,
                  'task_id'         => $iterasi,
                  'answer'          => $request['answer'.$i],
                  'is_true'          => $is_true
              ];

            // ini kerja is true
             $answerr = 'App\Answer'::where('task_id',$iterasi)->where('is_answer',1)->get()->first()->is_answer; //task id nya sesuai dengan nomor soal yang kita cek && no. soal, liat dr FOR-nya
             $choice = 'App\Answer'::where('task_id',$iterasi)->where('is_answer',1)->get()->first()->choice; // ini buat ngambil jawaban yang benar dr task id (dr soal yang kita cek)

             //ini buat cek benar atau salah. klo benar is_true dr tempat nyimpen jadi 1. atau answer.
             if($request['answer'.$i] == $choice){$aanswer['is_true'] = 1;} //untuk ngerubah is_true nya yang di $aanswer

             'App\StudentAnswer'::create($aanswer); //setelah tau jwbn bnr/salah, baru tempat yang uda disiapin, di push ke db
        }

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
