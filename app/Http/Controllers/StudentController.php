<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Student;
use App\Models\Country;

class StudentController extends Controller
{
    public function welcome()
    {

        return view('enrollment.index');

    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            
            $stundents = Student::with(['country' => function($td){
                            $td->select('idmunicipio', 'name');
                         }])
                        ->select(['id', 'name', 'lastname', 'email', 'age', 'idmunicipioFK'])
                        ->get();
                                    
            return Datatables::of($stundents)
            ->addIndexColumn()
            ->addColumn('country', function ($td) {

                
                $country = "<b>".$td->country->name."</b>";

                return $country;
                
           
             })
            ->addColumn('students', function ($td) {

                $pivot = count($td->subjects()->where('student_id', $td->id)->get());

                $boton = '<button type="button" class="btn btn-dark btn-circle btn-sm" onclick="upStd('.$td->id.')" data-toggle="tooltip" data-placement="top" title="Modificar alumno"><i class="fas fa-pencil-alt"></i></button>&nbsp';

                if($pivot > 0){

                    $boton .=  '<a type="button" href="'.route('enrollment.edit', $td->id).'" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Matricular/Desmatricular asignaturas">
                                <i class="fas fa-pen-square"></i>
                            </a>&nbsp';

                    $boton .=   '<a type="button" onclick="unEnRll('.$td->id.')" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Desmatricular alumno completamente">
                                    <i class="fas fa-times-circle text-white"></i>
                                </a>';

                }
                else{
 
                    $boton .=  '<a type="button" href="'.route('enrollment.create', $td->id).'" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Matricular">
                                    <i class="fas fa-check-circle""></i>
                               </a>';

                }
      
             
                return $boton;
                
                
           
            })
            ->addColumn('subjects', function ($td) {

                $pivot = $td->subjects();
                $counter = count($pivot->where('student_id', $td->id)->get());
                $boton  = "";


                if($counter > 0){

                    $boton .= "<b class='text-success'>".$pivot->pluck('name')->implode(", ")."</b>&nbsp";
                    $boton .= "<b class='text-success'>(".$pivot->pluck('credits')->implode(", ")." Creditos)</b>&nbsp";

                }
                else{
 
                    $boton  .=   '<b class="text-danger">No hay asignaturas matriculadas a la fecha<b>&nbsp';

                }

                
      
             
                return $boton;
                
                
           
            })
            ->rawColumns(['country', 'students', 'subjects'])
            ->make(true);

        }

        return view('enrollment.index');

    }

    public function getCountry()
    {

        $country = Country::select('idmunicipio', 'name')->get();

        return response()->json(['country' => $country]);

    }

    public function store(Request $request)
    {

        $data = [

            'name' => $request->name,
            'lastname' => $request->lastname, 
            'email' => $request->email,
            'age' => $request->age,
            'idmunicipioFK' => $request->city, 

        ];

        $student = Student::create($data);

        if($student){

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

        $data = [

            'name' => $request->name,
            'lastname' => $request->lastname, 
            'email' => $request->email,
            'age' => $request->age,
            'idmunicipioFK' => $request->city,

        ];

        $stdUp = $student->update($data);

        if($stdUp){

            return redirect()->route('students.index');

        }

    }

}
