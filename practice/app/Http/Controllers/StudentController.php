<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students=Student::all();
        // dd($student);   
        return view('student.index',compact('students'));
    }

    public function create(){
        return view('student.create');
    }

    public function store(StudentRequest $request){
      Student::create($request->all());
      return redirect()->route('student.index')->with('success','new student successfuly create');
    }

    public function edit(Student $student){
        // $student=Student::find($student);
        // dd($student);   
        return view('student.edit',compact('student'));
    }

    public function update(Student $student , StudentRequest $request){
        // Student::create($request->all());
        $student->update($request->all());
        return redirect()->route('student.index')->with('success','new student successfuly updated');
      }

      public function delete(Student $student){
        $student->delete();
        return redirect()->route('student.index')->with('success','new student successfuly deleted');
      }
}
