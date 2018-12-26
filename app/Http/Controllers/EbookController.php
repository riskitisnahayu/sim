<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EbookController extends Controller
{

        public function index(Request $request)
        {
            // $ebooks = EBook::all();
            //  // dd($ebooks);
            return view('ebook.index')->with('i', ($request->input('page', 1) - 1) * 10); //melempar data ke view
        }
}
