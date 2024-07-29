<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addUser;

class adduserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = addUser::all();
        
        return view('admin.user.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // return $request->all();
        $add = new addUser;
        $add->name = $request->input('name');
        $add->phone = $request->input('phone');
        $add->desigination = $request->input('select');
        $add->comment = $request->input('comment');
        $add->save();

        return redirect()->route('user.index')->with('status','Add Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = addUser::find($id);
        
        return view('admin.user.single', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = addUser::find($id);
        
        return view('admin.user.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $add = addUser::find($id);
        $add->name = $request->input('name');
        $add->phone = $request->input('phone');
        $add->desigination = $request->input('select');
        $add->comment = $request->input('comment');
        $add->update();

        return redirect()->route('user.index')->with('status','Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $add = addUser::findOrFail($id);
        $add->delete();

    return redirect()->route('user.index')
                     ->with('status', 'User deleted successfully.');
    }
}
