<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Task;
use App\TaskMaster;
use App\Answer;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tasks = Task::all();
        //  // dd($gamecategories);
        // return view('task.index', compact('tasks'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        // $total = $request->total_task;
        $total = 10;
        $choices = ['a', 'b', 'c', 'd'];
        $taskmaster_id = $id;
        // dd($total);
        return view('task.create', compact('total', 'choices', 'taskmaster_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //       'description'    => 'required',
        //       'choice_answer'  => 'required',
        //       'is_answer'      => 'required',
        // ],
        //
        // [
        //      'description.required'     => 'Deskripsi soal harus diisi!',
        //      'choice_answer.required'     => 'Deskripsi pilihan harus diisi!',
        //      'is_answer.required'      => 'Jawaban benar harus diisi!',
        //  ]
        //
        // );

        DB::beginTransaction();
        // dd($request);

        $tasks = [];
        for ($i=0; $i < @count($request->task["description"]); $i++) {
            $newName = null;
            if (@isset($request->images[$i])) {
                $ext     = $request->images[$i]->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $request->images[$i]->move('images',$newName);
            }
            $tasks[$i] = [
                'taskmaster_id' => $request->taskmaster_id,
                'description'   => $request->task["description"][$i],
                'discussion'    => $request->task["discussion"][$i],
                'image'         => $newName,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ];
        }

        $answers = [];
        $choices = ['a', 'b', 'c', 'd'];
        for ($i=0; $i < @count($request->answer); $i++) {
            for ($j=0; $j < @count($request->answer[$i]); $j++) {
                $answers[$i][$j] = [
                    'choice'        => $choices[$j],
                    'choice_answer' => $request->answer[$i][$j],
                    'user_answer'   => null,
                    'is_answer'     => $request->true_answer[$i] == $j ? 1 : 0,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ];
            }
        }
        // dd($answers);

        foreach ($tasks as $key => $task) {
            $task_result = Task::create($task);
            if (!$task_result) {
                DB::rollback();
            }
            // dd($task_result);
            $answer_result = $task_result->answers()->createMany($answers[$key]);
            if (!$answer_result) {
                DB::rollback();
            }
        }

        DB::commit();

        Alert::success('Sukses', 'Soal berhasil ditambahkan!');

        //  // redirect menggunakan url lengkap sedangkan route menggunakan route name
        return redirect()->route('admin.banksoal');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $tasks = Task::where('id', $id)->get();
        // dd($tasks);
        $answers = [];
        foreach ($tasks as $key => $curr_task) {
            $answers[$key] = $curr_task->answers()->orderBy('choice', 'asc')->get();
        }
        // dd($answers);
        $choices = ['a', 'b', 'c', 'd'];
        return view('task.edit', compact('tasks', 'answers','choices'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $tasks = TaskMaster::where('id', $id)->first()->tasks()->get();
        // $tasks = Answer::leftJoin('tasks','answers.task_id','=','tasks.id')
        //             ->leftJoin('task_masters','tasks.taskmaster_id','=','task_masters.id')
        //             ->where('task_masters.id',$id)
        //             ->where('answers.is_answer',1)
        //             ->get();
                    // dd($tasks);
        $answers = [];
        foreach ($tasks as $key => $curr_task) {
            $answers[$key] = $curr_task->answers()->orderBy('choice', 'asc')->get();
        }

        // dd($answers);
        $total = $request->total_task;
        $choices = ['a', 'b', 'c', 'd'];
        $taskmaster_id = $id;
        return view('task.detail', compact('tasks', 'answers', 'total', 'choices', 'taskmaster_id'))->with('i', ($request->input('page', 1) - 1) * 10);
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
        // $this->validate($request, [
        //       'description'    => 'required',
        //       'choice_answer'  => 'required',
        //       'is_answer'      => 'required',
        // ],
        //
        // [
        //      'description.required'     => 'Deskripsi soal harus diisi!',
        //      'choice_answer.required'     => 'Deskripsi pilihan harus diisi!',
        //      'is_answer.required'      => 'Jawaban benar harus diisi!',
        //  ]
        //
        // );

        DB::beginTransaction();
        // dd($request);
        $existing_task = Task::where('id', $id)->first();
        // dd($existing_task);
        $existing_answer = Answer::where('task_id', $existing_task->id)->get();
        if (!$existing_answer) {
            DB::rollback();
        }

        if ($request->file('image'))
        {
            $image   = $request->file('image');
            $ext     = $image->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $image->move('images',$newName);
            $existing_task->image = $newName;
        }
        // $existing_task->image = $request->;
        $existing_task->description = $request->description;
        $existing_task->discussion = $request->discussion;
        $existing_task->save();

        // for ($i=0; $i < @count($request->task["description"]); $i++) {
        //     $tasks[$i] = [
        //         'taskmaster_id' => $request->taskmaster_id,
        //         'description'   => $request->task["description"][$i],
        //         'discussion'    => $request->task["discussion"][$i],
        //         'created_at'    => Carbon::now(),
        //         'updated_at'    => Carbon::now(),
        //         'image'         => $newName
        //     ];
        // }
        // dd($request);

        $answers = [];
        $choices = ['a', 'b', 'c', 'd'];
        for ($i=0; $i < @count($request->answer); $i++) {
            for ($j=0; $j < @count($request->answer[$i]); $j++) {
                $answers[$i][$j] = [
                    'choice'        => $choices[$j],
                    'choice_answer' => $request->answer[$i][$j],
                    'user_answer'   => null,
                    'is_answer'     => $request->true_answer[0] == $j+1 ? 1 : 0,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ];
            }
        }


        for ($j=0; $j < 4; $j++) {
            $existing_task->answers()->createMany($answers[$j]);
        }
        // dd($answers);

        DB::commit();

        Alert::success('Sukses', 'Soal berhasil diubah!');

        //redirect menggunakan url lengkap sedangkan route menggunakan route name
        return redirect()->route('admin.banksoal');

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
