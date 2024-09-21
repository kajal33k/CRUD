<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalRequest;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    
    public function index()
    {
        $hospitals = Hospital::all(); 
        return view('hospital.index', compact('hospitals'));
    }

   
    public function create()
    {
        return view('hospital.create'); 
    }

  
    public function store(HospitalRequest $request)
    {
        
        Hospital::create($request->validated());

        
        return redirect()->route('hospital.index')->with('success', 'Hospital successfully created.');
    }

   
    public function edit(Hospital $hospital)
    {
      
        return view('hospital.edit', compact('hospital'));
    }

    
    public function update(HospitalRequest $request, Hospital $hospital)
    {
       
        $hospital->update($request->validated());

 
        return redirect()->route('hospital.index')->with('success', 'Hospital successfully updated.');
    }

  
    public function destroy(Hospital $hospital)
    {
     
        $hospital->delete();

        return redirect()->route('hospital.index')->with('success', 'Hospital successfully deleted.');
    }
}
