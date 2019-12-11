<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Http\Resources\StudentCollection;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studs = Student::all();  
        //$studs = Student::paginate(2);              
        return new StudentCollection($studs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stud = new Student([
            'name' => $request->input('name'),
            'program_id'=> $request->input('program_id'),
            'email'=> $request->input('email'),
            'status'=> $request->input('status')
        ]);          
            
        if($stud->save()) {
            return new StudentResource($stud);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stud = Student::find($id); 
        if (!$stud){
            return response()->json('Hiba');
        }        
        return new StudentResource($stud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stud = Student::findOrFail($id);   

        $stud->name = $request->input('nev');
        $stud->program_id = $request->input('program_id');
        $stud->email = $request->input('email');
        $stud->status = $request->input('status');
 
        if($stud->save()) {
            return new StudentResource($stud);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stud = Student::findOrfail($id);
 
        if($stud->delete()) {
            return new StudentResource($stud);
        } 
    }
}
