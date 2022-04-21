<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Country;

class EnrollmentController extends Controller
{
   
    public function create(Request $request, $id)
    {

        $student = Student::findOrFail($id);
          
        $subjects = Subject::select('id', 'name', 'credits')->get();

        return view('enrollment.create', compact('subjects', 'student'));

    }

    public function edit(Request $request, $id)
    {
        
        $student = Student::findOrFail($id);
          
        $subjects = Subject::select('id', 'name', 'credits')->get();

        if(count($student->subjects) > 0){

            return view('enrollment.edit', compact('subjects', 'student'));
        }
        else{

            return redirect()->route('students.index');

        } 

    }

    public function store(Request $request, $id)
    {

        $student = Student::findOrFail($id);

        $enrollment = $student->subjects()->sync($request->subject);


        if($enrollment){

            return redirect()->route('students.index');

        }


    }

    public function show($id)
    {

        $student = Student::with(['country' => function($td){
                        $td->select('idmunicipio', 'name');
                    }])
                    ->findOrFail($id);

        return response()->json([ 'student' => $student ]);

    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $enrollment = $student->subjects()->sync($request->subject);


        if($enrollment){

            return redirect()->route('students.index');

        }

    }

    public function unEnroll(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $enrollment = $student->subjects()->detach();


        if($enrollment){

            return redirect()->route('students.index');

        }
    }
}
