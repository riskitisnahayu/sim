<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameCategory;
use RealRashid\SweetAlert\Facades\Alert;


class GameCategoryController extends Controller
{
    public function index(Request $request) // untuk dashboard/halaman2 awal &&&& return view ditaruh di index aja
    {
        $gamecategories = GameCategory::all();
        return view('gamecategory.index', compact('gamecategories'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view

    }

    public function create()
    {
        return view('gamecategory.create');
    }

    public function store(Request $request) // untuk menghandel form tambah data
    {
       $this->validate($request, [
             'name'          => 'required|max:191',
             'description'   => 'required|max:191',
       ],

       [
            'name.required'    => 'Nama harus diisi!',
            'name.max'         => 'Nama terlalu panjang!',
            'description.required'  => 'Deskripsi harus diisi!',
            'description.max'    => 'Deskripsi terlalu panjang!',
        ]
    );
       $gamecategories = new GameCategory();
       $gamecategories->name=$request->name;
       $gamecategories->description=$request->description;
       $gamecategories->save();

       Alert::success('Sukses', 'Kategori game berhasil ditambahkan!');

        // redirect menggunakan url lengkap sedangkan route menggunakan route name
        return redirect()->route('admin.gamecategory');
    }

    public function show($id) // untuk menampilkan/ melihat data
    {
        $gamecategories = GameCategory::find($id);
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
              'name'          => 'required|max:191',
              'description'   => 'required|max:191',
        ],

        [
            'name.required'    => 'Nama harus diisi!',
            'name.max'         => 'Nama terlalu panjang!',
            'description.required'  => 'Deskripsi harus diisi!',
            'description.max'    => 'Deskripsi terlalu panjang!',
         ]
     );

        $gamecategories = GameCategory::where('id',$id)->first();
        $gamecategories->name  = $request->name;
        $gamecategories->description = $request->description;
        $gamecategories->save();

        Alert::success('Sukses', 'Kategori game berhasil diubah!');

        return redirect()->route('admin.gamecategory');
    }

    public function destroy($id) // delete
    {
         $gamecategories = GameCategory::where('id',$id)->first();
         $gamecategories->delete();
         return redirect()->route('admin.gamecategory');
    }

    // API
    public function api_getGameCategory() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $gamecategories = GameCategory::all(); // untuk mengambil semua data SubjectsCategory
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $gamecategories
        ]);
    }

    public function api_show($id)
    {
        $gamecategories = GameCategory::find($id);

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $gamecategories
        ]);
    }

}
