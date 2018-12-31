<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EBook;
use App\SubjectsCategory;

class EbookController extends Controller
{

        public function index(Request $request)
        {
            $ebooks = EBook::all();
            $subjectscategories = SubjectsCategory::all();
            //  // dd($ebooks);
            return view('ebook.index', compact('ebooks', 'subjectscategories'))->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
        }

        public function create() // untuk menampilkan form tmbah data
        {
            $subjectscategories = SubjectsCategory::all();
            return view('ebook.create',compact('subjectscategories'));
        }

        public function store(Request $request) // untuk menghandel form tambah data
        {
           $this->validate($request, [
                 'image'         => 'required',
                 'title'          => 'required',
                 'subjectscategories_id'      => 'required',
                 'class'         => 'required',
                 'semester'         => 'required',
                 'author'        => 'required',
                 'publisher'     => 'required',
                 'year'          => 'required',
                 'url'           => 'required',
           ]);


           $ebooks = new EBook();
           $ebooks->title=$request->title;
           $ebooks->subjectscategories_id=$request->subjectscategories_id;
           $ebooks->class=$request->class;
           $ebooks->semester=$request->semester;
           $ebooks->author=$request->author;
           $ebooks->publisher=$request->publisher;
           $ebooks->year=$request->year;
           $ebooks->url=$request->url;

           $image   = $request->file('image');
           $ext     = $image->getClientOriginalExtension();
           $newName = rand(100000,1001238912).".".$ext;
           $image->move('images',$newName);
           $ebooks->image = $newName;
           $ebooks->save();

            // redirect menggunakan url lengkap sedangkan route menggunakan route name
            return redirect()->route('admin.ebook');
        }

        public function show($id) // untuk menampilkan/ melihat data
        {
            $ebooks = EBook::find($id);
               // dd($ebooks);
            $subjectscategories = SubjectsCategory::all();
            return view('ebook.detail', compact('ebooks','subjectscategories'));
        }

        public function edit($id) // untuk menampilkan form untuk edit data
        {
            $ebooks = EBook::find($id);
            $subjectscategories = SubjectsCategory::all();
            return view('ebook.edit', compact('ebooks','subjectscategories'));
        }

        public function update(Request $request, $id) // untuk menghandel form edit data
        {
            $this->validate($request, [
                'title'          => 'required',
                'subjectscategories_id'      => 'required',
                'class'         => 'required',
                'semester'      => 'required',
                'author'        => 'required',
                'publisher'     => 'required',
                'year'          => 'required',
                'url'           => 'required',
            ]);

            $ebooks = EBook::where('id',$id)->first();
            $ebooks->title=$request->title;
            $ebooks->subjectscategories_id=$request->subjectscategories_id;
            $ebooks->class=$request->class;
            $ebooks->semester=$request->semester;
            $ebooks->author=$request->author;
            $ebooks->publisher=$request->publisher;
            $ebooks->year=$request->year;
            $ebooks->url=$request->url;
            $ebooks->save();
            return redirect()->route('admin.ebook')->with('alert-success','Data berhasil diubah!');
        }

        public function destroy($id) // delete
        {
             $ebooks = EBook::where('id',$id)->first();
             $ebooks->delete();
             return redirect()->route('admin.ebook')->with('sukses', 'Data Berhasil Dihapus!');
        }
}
