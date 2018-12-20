<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameCategory;

class GameCategoryController extends Controller
{
    public function index(Request $request) // untuk dashboard/halaman2 awal &&&& return view ditaruh di index aja
    {
        $gamecategories = GameCategory::all();
         // dd($gamecategories);
        return view('gamecategory.index', compact('gamecategories'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view

    }

    public function create()
    {
        return view('gamecategory.create');
    }

    public function store(Request $request) // untuk menghandel form tambah data
    {
       $this->validate($request, [
             'name'          => 'required',
             'description'   => 'required',
       ]);

       $gamecategories = new GameCategory();
       $gamecategories->name=$request->name;
       $gamecategories->description=$request->description;
       $gamecategories->save();
        // redirect menggunakan url lengkap sedangkan route menggunakan route name
        return redirect()->route('admin.gamecategory')->with('success','Kategori game berhasil ditambahkan!');
    }

    public function show($id) // untuk menampilkan/ melihat data
    {
        $gamecategories = GameCategory::find($id);
           // dd($gamecategories);
        return view('gamecategory.detail', compact('gamecategories'));
    }

    public function edit($id) // untuk menampilkan form untuk edit data
    {
        $gamecategories = GameCategory::find($id);
        return view('gamecategory.edit', compact('gamecategories'));
    }

    public function update(Request $request, $id) // untuk menghandel form edit data
    {
        $this->validate($request, [
              'name'          => 'required',
              'description'   => 'required',
        ]);

        $gamecategories = GameCategory::where('id',$id)->first();
        $gamecategories->name  = $request->name;
        $gamecategories->description = $request->description;
        $gamecategories->save();
        return redirect()->route('admin.gamecategory')->with('alert-success','Kategori game berhasil diubah!');
    }

    public function destroy($id) // delete
    {
         $gamecategories = GameCategory::where('id',$id)->first();
         $gamecategories->delete();
         return redirect()->route('admin.gamecategory')->with('sukses', 'Kategori game berhasil dihapus!');
    }

}
