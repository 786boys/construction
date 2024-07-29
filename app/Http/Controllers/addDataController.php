<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddData;
use App\Models\addUser;
use App\Models\addSite;
use App\Models\Expenses;

class addDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $search = $request['query'] ?? "";
        if ($search != "") {
            $data = addData::where('user','like', "%$search%")
            ->orwhere('expence','like', "%$search%")
            ->orwhere('location','like', "%$search%")->get();
        } else {
            $data = addData::all();
        }
        
        return view('admin.addData.show', compact('data','search'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datauser = addUser::all();
        $data = addSite::all();
        $expenses = Expenses::all();

        return view('admin.addData.add-data' , compact('data','expenses','datauser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sitename' => ['required', 'string', 'max:255'],
            'expence' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
            'custom_date' => 'required|date',
        ]);
    //    dd($request->all());
       $add = new addData;
       $add->location = $request->input('sitename');
       $add->user = $request->input('user');
       $add->paymentType = $request->input('payment');
       $add->expence = $request->input('expence');
       $add->description = $request->input('description');
       $add->amount = $request->input('amount');
       $add->custom_date = $request->input('custom_date');
       $add->save();

       return redirect()->route('data.index')->with('status','Add Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = addData::find($id);
        
        return view('admin.addData.single', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datauser = addUser::all();
        $itemee = addData::find($id);
        $data = addSite::all();
        $expenses = Expenses::all();

        
        return view('admin.addData.edit', compact('itemee','data','expenses','datauser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {    $request->validate([
        'sitename' => ['required', 'string', 'max:255'],
        'expence' => ['required', 'string', 'max:255'],
        'amount' => ['required', 'string', 'max:255'],
        'custom_date' => 'required|date',
       
    ]);
        $add = addData::find($id);
        $add->location = $request->input('sitename');
       $add->paymentType = $request->input('payment');
       $add->user = $request->input('user');
       $add->expence = $request->input('expence');
       $add->description = $request->input('description');
       $add->amount = $request->input('amount');
       $add->custom_date = $request->input('custom_date');
        $add->update();

        return redirect()->route('data.index')->with('status','Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $add = AddData::findOrFail($id);
        $add->delete();

    return redirect()->route('data.index')
                     ->with('status', 'User deleted successfully.');
    }

}

