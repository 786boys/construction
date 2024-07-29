<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddSite;
use App\Models\addUser;

class addSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AddSite::all();
        return view('admin.addSite.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $data = addUser::all();
        return view('admin.addSite.add-site',
         compact('data')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new AddSite;
        $add->name = $request->input('name');
        $add->address = $request->input('address');
        $add->siteOwner = $request->input('siteOwner');
        $add->siteIncharge = $request->input('siteIncharge');
        $add->superVisor = $request->input('superVisor');
        $add->save();

        return redirect()->route('site.index')->with('status','Add Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = AddSite::find($id);
        
        return view('admin.addSite.single', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = addUser::all();
        $item = AddSite::find($id);
        
        return view('admin.addSite.edit', compact('item','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $add = AddSite::find($id);
        $add->name = $request->input('name');
        $add->address = $request->input('address');
        $add->siteOwner = $request->input('siteOwner');
        $add->siteIncharge = $request->input('siteIncharge');
        $add->superVisor = $request->input('superVisor');
        $add->update();

        return redirect()->route('site.index')->with('status','Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $add = AddSite::findOrFail($id);
        $add->delete();

    return redirect()->route('site.index')
                     ->with('status', 'User deleted successfully.');
    }
}
