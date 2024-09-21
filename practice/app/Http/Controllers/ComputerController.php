<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest; 
use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    
    public function index()
    {
        $computers = Computer::all();
        return view('computer.index', compact('computers'));
    }

   
    public function create()
    {
        return view('computer.create');
    }

    
    public function store(ComputerRequest $request)
    {
        
        Computer::create($request->validated());

       
        return redirect()->route('computer.index')->with('success', 'Computer successfully created.');
    }

 
    public function edit(Computer $computer)
    {
        return view('computer.edit', compact('computer'));
    }

   
    public function update(ComputerRequest $request, Computer $computer)
    {
        
        $computer->update($request->validated());

        return redirect()->route('computer.index')->with('success', 'Computer successfully updated.');
    }

   
    public function destroy(Computer $computer)
    {
        
        $computer->delete();

        
        return redirect()->route('computer.index')->with('success', 'Computer successfully deleted.');
    }
}
