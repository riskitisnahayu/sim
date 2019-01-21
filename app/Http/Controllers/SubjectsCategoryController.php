<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsCategory;
use RealRashid\SweetAlert\Facades\Alert;


class SubjectsCategoryController extends Controller
{
    public function index(Request $request) // untuk dashboard/halaman2 awal &&&& return view ditaruh di index aja
    {
        $subjectscategories = SubjectsCategory::all();
         // dd($subjectscategories);
        return view('subjectscategory.index', compact('subjectscategories'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view

    }

    public function create()
    {
        return view('subjectscategory.create');
    }

    public function store(Request $request) // untuk menghandel form tambah data
    {
       $this->validate($request, [
             'name'          => 'required',
             'description'   => 'required',
       ],

       [
            'name.required'         => 'Nama harus diisi!',
            'description.required'  => 'Deskripsi harus diisi!',
        ]
    );

       $subjectscategories = new SubjectsCategory();
       $subjectscategories->name=$request->name;
       $subjectscategories->description=$request->description;
       $subjectscategories->save();

       Alert::success('Sukses', 'Kategori game berhasil ditambahkan!');

        // redirect menggunakan url lengkap sedangkan route menggunakan route name
        return redirect()->route('admin.subjectscategory');
    }

    public function show($id) // untuk menampilkan/ melihat data
    {
        $subjectscategories = SubjectsCategory::find($id);
           // dd($subjectscategories);
        return view('subjectscategory.detail', compact('subjectscategories'));
    }

    public function edit($id) // untuk menampilkan form untuk edit data
    {
        $subjectscategories = SubjectsCategory::find($id);
        return view('subjectscategory.edit', compact('subjectscategories'));
    }

    public function update(Request $request, $id) // untuk menghandel form edit data
    {
        $this->validate($request, [
              'name'          => 'required',
              'description'   => 'required',
        ],

        [
             'name.required'         => 'Nama harus diisi!',
             'description.required'  => 'Deskripsi harus diisi!',
         ]
     );

        $subjectscategories = SubjectsCategory::where('id',$id)->first();
        $subjectscategories->name  = $request->name;
        $subjectscategories->description = $request->description;
        $subjectscategories->save();

        Alert::success('Sukses', 'Kategori game berhasil diubah!');
        return redirect()->route('admin.subjectscategory');
    }

    public function destroy($id) // delete
    {
         $subjectscategories = SubjectsCategory::where('id',$id)->first();
         $subjectscategories->delete();
         return redirect()->route('admin.subjectscategory');
    }


}
