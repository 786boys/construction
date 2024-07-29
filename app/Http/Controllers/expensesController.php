<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class expensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Expenses::all();
        
        return view('admin.addExpence.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addExpence.add-expenses');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new Expenses;
        $add->name = $request->input('name');
        $add->comment = $request->input('comment');
        $add->save();

        return redirect()->route('expenses.index')->with('status','Add Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Expenses::find($id);
        
        return view('admin.addExpence.single', compact('item'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item =  Expenses::find($id);
        
        return view('admin.addExpence.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $add = Expenses::find($id);
        $add->name = $request->input('name');
       
        $add->comment = $request->input('comment');
        $add->update();

        return redirect()->route('expenses.index')->with('status','Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $add = Expenses::findOrFail($id);
        $add->delete();

    return redirect()->route('expenses.index')
                     ->with('status', 'User deleted successfully.');
    }
}
