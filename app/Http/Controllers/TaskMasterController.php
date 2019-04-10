<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskMaster;
use App\SubjectsCategory;

class TaskMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $task_masters = TaskMaster::all();
        $subjectscategories = SubjectsCategory::all();
        return view('taskmaster.index', compact('task_masters', 'subjectscategories'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task_masters = TaskMaster::all();
        $subjectscategories = SubjectsCategory::all();
        return view('taskmaster.create',compact('task_masters','subjectscategories'));
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
              'title'          => 'required|max:191',
              'class'          => 'required',
              'semester'       => 'required',
              'subjectscategories_id'      => 'required',
              'total_task'     => 'required',
              'timeout'        => 'required',

        ],
        [
             'title.required'       => 'Judul harus diisi!',
             'title.max'            => 'Judul terlalu panjang!',
             'class.required'       => 'Kelas harus diisi!',
             'semester.required'    => 'Semester harus diisi!',
             'subjectscategories_id.required'      => 'Mata pelajaran harus diisi!',
             'timeout.required'    => 'Durasi waktu harus diisi!',
             'total_task.required' => 'Jumlah soal harus diisi!',
         ]
    );


        $task_masters = new TaskMaster();
        $task_masters->title=$request->title;
        $task_masters->class=$request->class;
        $task_masters->semester=$request->semester;
        $task_masters->subjectscategories_id=$request->subjectscategories_id;
        $task_masters->total_task=$request->total_task;
        $task_masters->timeout=$request->timeout;
        $task_masters->save();

         // redirect menggunakan url lengkap sedangkan route menggunakan route name
         return redirect("admin/soal/tambah/".$task_masters->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $task_masters = TaskMaster::find($id);
        //    // dd($ebooks);
        // $subjectscategories = SubjectsCategory::all();
        // return view('taskmaster.detail', compact('task_masters','subjectscategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task_masters = TaskMaster::find($id);
        $subjectscategories = SubjectsCategory::all();
        return view('taskmaster.edit', compact('task_masters','subjectscategories'));
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
        $this->validate($request, [
              'title'          => 'required|max:191',
              'class'          => 'required',
              'semester'       => 'required',
              'subjectscategories_id'      => 'required',
              'total_task'     => 'required',
              'timeout'        => 'required',
        ],
        [
             'title.required'     => 'Judul harus diisi!',
             'title.max'          => 'Judul terlalu panjang!',
             'class.required'     => 'Kelas harus diisi!',
             'semester.required'  => 'Semester harus diisi!',
             'subjectscategories_id.required'      => 'Mata pelajaran harus diisi!',
             'total_task.required'=> 'Jumlah soal harus diisi!',
             'timeout.required'   => ' Set waktu harus diisi!',
         ]
    );

        $task_masters = TaskMaster::where('id',$id)->first();
        $task_masters->title=$request->title;
        $task_masters->class=$request->class;
        $task_masters->semester=$request->semester;
        $task_masters->subjectscategories_id=$request->subjectscategories_id;
        $task_masters->timeout=$request->timeout;
        $task_masters->save();
        return redirect("admin/soal/detail/".$task_masters->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task_masters = TaskMaster::where('id',$id)->first();
        $task_masters->delete();
        return redirect()->route('admin.banksoal');
    }
}
