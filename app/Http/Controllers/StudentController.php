<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Program;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

	public function index()
    {
    	$studs = Student::all();
   		return view('home', compact('studs'));
    } 

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', ['student' => $student]);    	
    }

    public function create()
    {
        $programs = Program::all();
        return view('students.create', compact('programs')); 
    } 

    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required',
        'program'=>'required',
        'email'=> 'required|email',
        'status' => 'required|integer',
        'picture' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
      ]);

      $originalImage = $request->file('picture');
      //dd($originalImage);
      $originalImageName = $originalImage->getClientOriginalName();
      //$originalImage->storeAs('public/pictures', $originalImageName);
      //$originalImage->storeAs('pictures', $originalImageName);
      $path = Storage::disk('public')->putFileAs(
    'pictures', $request->file('picture'), $originalImageName
);


      $student = new Student([
        'name' => $request->input('name'),
        'program'=> $request->input('program'),
        'email'=> $request->input('email'),
        'status'=> $request->input('status'),
        'picture'=> $originalImageName,
      ]);     
      $student->save();
      return redirect('/home')->with('status', 'Student has been added');
    } 

    public function edit($id)
    {
        $stud = Student::find($id);
        return view('students.edit', compact('stud', 'id'));
    } 

    public function update(Request $request, $id)
    {
        $request->validate([
          'name'=>'required',
          'email'=> 'required|email',
          'status' => 'required|integer'
        ]);
        $stud = Student::find($id);
        $stud->name = $request->input('name');
        $stud->email = $request->input('email');
        $stud->status = $request->input('status');
        $stud->save();
        return redirect('/home')->with('status', 'Student has been updated');
    }  

    public function destroy($id)
    {
      $student = Student::find($id);
      Storage::disk('public')->delete('pictures/'.$student->picture);
      $student->delete();
      return redirect('/home')->with('status', 'Student has been deleted!!'); 
    } 
}
