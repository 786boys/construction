<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddData;

class ItemController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = AddData::where('name', 'LIKE', "%$query%")->get();

        return view('search', ['items' => $items, 'query' => $query]);
    }
}
