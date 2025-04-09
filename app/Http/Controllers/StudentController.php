<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //

 /*    function list(){

        return "list function called";

    } */

    function list(){

        return Student::all();

    }

    function addStudent(Request $req){
        return $req->input();
    }

    /* function addStudentt(){
        return "Add student method";
    } */

    /* function addStudentt(Request $req){
        return $req->input();
    } */

   /*  function addStudentt(Request $req){
        $student = new Student();

        $student->name = $req->name;
        $student->email = $req->email;
        $student->batch = $req->batch;

        if($student->save()){
            // return "Student Added";
            
            return ["result"=>"student Added"];
        }
        else{
            // return "Operation Failed";

            return ["result"=>"Operation Failed"];
        }
    } */

    function addStudentt(Request $req){

        $rules = array(
            'name'=>'required | min:2 | max:20',
            "email"=>'email | required',
            "batch"=>'required'
        );

        $validation = Validator::make($req->all(),$rules);
        
        if($validation->fails()){
            return $validation->errors();
        }
        else{
            $student = new Student();

            $student->name = $req->name;
            $student->email = $req->email;
            $student->batch = $req->batch;
    
            if($student->save()){
                // return "Student Added";
                
                return ["result"=>"student Added"];
            }
            else{
                // return "Operation Failed";
    
                return ["result"=>"Operation Failed"];
            }
        }
    }

    function updateStudent(Request $request){
        $student = Student::find($request->id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->batch = $request->batch;

        if($student->save()){
            
            return ["result"=>"Student Updated"];
        }
        else{

            return ["result"=>"Student Not Updated"];
        }
    }

    /* function deleteStudent($id){
       return $id;
    } */

    function deleteStudent($id){
        $student = Student::destroy($id);

        if($student){
            return ["result"=>"Student record deleted"];
        }
        else{
            return ["result"=>"Student record not deleted"];
        }
    }

    /* function searchStudent(){
        return "search api";
    } */

   /*  function searchStudent($name){
        return "search api ".$name;
    } */

    function searchStudent($name){
        $student = Student::where('name','like',"%$name%")->get();

        if($student){
            return ["result"=>$student];
        }
        else{
            return ["result"=>"not record found"];
        }
    }

}
