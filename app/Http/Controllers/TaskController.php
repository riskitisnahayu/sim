<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Task;
use App\Answer;

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
        $total = $request->total;
        $choices = ['a', 'b', 'c', 'd'];
        $taskmaster_id = $id;
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
        // dd($request);

        $choices = ['a', 'b', 'c', 'd'];
        $answer = [];
        for ($i=0; $i < @count($request->task["description"]); $i++) {
            $k = 0;
            for ($j=0; $j < 4; $j++) {
                $answer[$k] = [
                    'choice'        => $choices[$j],
                    'choice_answer' => $request->answer[$i][$j],
                    'user_answer'   => null,
                    'is_answer'     => $request->true_answer[$i] == $j+1 ? 1 : 0,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ];
                $k++;
            }

        }
        dd($answer);
        for ($i=0; $i < count($request->task->description); $i++) {
            Task::create([
                'taskmaster_id' => $request->taskmaster_id,
                'description'   => $request->task->description[$i],
                'discussion'    => $request->task->description[$i]
            ])->answer()->insert([]);
        }

        // $tasks = new Task();
        // $tasks->taskmaster_id=$request->taskmaster_id;
        // $tasks->description=$request->description;
        // $tasks->discussion=$request->discussion;
        // $tasks->save();
        //
        //  // redirect menggunakan url lengkap sedangkan route menggunakan route name
        //  return redirect()->route('admin.banksoal');

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
