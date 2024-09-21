<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilyRequest;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
  
    public function index()
    {
        $families = Family::all();
        return view('family.index', compact('families'));
    }

  
    public function create()
    {
        return view('family.create');
    }


    public function store(FamilyRequest $request)
    {
        // dd($request);
        Family::create($request->validated());

        return redirect()->route('family.index')->with('success', 'New family successfully created.');
    }

  
    public function edit(Family $family)
    {
        return view('family.edit', compact('family'));
    }

   
    public function update(Family $family, FamilyRequest $request)
    {
        $family->update($request->validated());

        return redirect()->route('family.index')->with('success', 'Family successfully updated.');
    }

 
    public function delete(Family $family)
    {
        $family->delete();

        return redirect()->route('family.index')->with('success', 'Family successfully deleted.');
    }
}
