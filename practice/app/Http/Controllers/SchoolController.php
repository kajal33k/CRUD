<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    
    public function index()
    {
        $schools = School::all(); 
        return view('school.index', compact('schools'));
    }

   
    public function create()
    {
        return view('school.create');
    }

    
    public function store(SchoolRequest $request)
    {
        // dd($request->all());
        $school = School::create($request->validated());
        $path = $request->file('image')->store('public/images');
        $school->image = str_replace('public/', '', $path);
        $school->save();
        
        return redirect()->route('school.index')->with('success', 'School successfully created.');
    }

   
    public function edit(School $school)
    {
        return view('school.edit', compact('school')); 
    }

    
    public function update(SchoolRequest $request, School $school)
    {
        $school->update($request->validated());
 
        return redirect()->route('school.index')->with('success', 'School successfully updated.');
    }

   
    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('school.index')->with('success', 'School successfully deleted.');
    }
}
