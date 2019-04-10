<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;

class ProvinceController extends Controller
{
    public function api_getProvince(Request $request)
    {
        if ($request->id) {
            $provinces = Province::where('id', $request->id)->get();
        } else {
            $provinces = Province::all();
        }

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $provinces
        ]);
    }
}
