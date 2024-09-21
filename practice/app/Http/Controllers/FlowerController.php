<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlowerRequest;
use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{

    public function index()
    {
        $flowers = Flower::all();
        return view('flower.index', compact('flowers'));
    }

   
    public function create()
    {
        return view('flower.create');
    }

    
    public function store(FlowerRequest $request)
    {
       
        $validatedData = $request->validated();

        
        

        
        $flower = Flower::create($validatedData);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $flower->picture_of_plant = str_replace('public/', '', $path);
            $flower->save();
        }
        
       
        return redirect()->route('flower.index')->with('success', 'Flower successfully created.');
    }

   
    public function edit(Flower $flower)
    {
        return view('flower.edit', compact('flower'));
    }

    
    public function update(FlowerRequest $request, Flower $flower)
    {
        
        $validatedData = $request->validated();

        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $validatedData['image'] = str_replace('public/', '', $path);
        }

        
        $flower->update($validatedData);

        // Redirect to index with success message
        return redirect()->route('flower.index')->with('success', 'Flower successfully updated.');
    }

    // Remove the specified resource from storage
    public function destroy(Flower $flower)
    {
        // Delete the flower
        $flower->delete();

        // Redirect to index with success message
        return redirect()->route('flower.index')->with('success', 'Flower successfully deleted.');
    }
}
