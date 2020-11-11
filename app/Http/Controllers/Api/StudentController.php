<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $student = Student::all();
        return response()->json($student);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'class_id'=> 'required',
            'section_id'=> 'required',
            'name'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'address'=> 'required',
            'password'=> 'required',
        ]);
        $student = new Student;
        $student->class_id  =  $data['class_id'];
        $student->section_id  =  $data['section_id'];
        $student->name  =  $data['name'];
        $student->gender  =  $data['gender'];
        $student->phone  =  $data['phone'];
        $student->email  =  $data['email'];
        $student->address  =  $data['address'];
        $student->photo  =  $data['photo'];
        $student->password  =  bcrypt($data['password']);
        $student->save();
        return response('Inserted Data Successfully!');
    }
    public function show($id)
    {
        $student =Student::findorfail($id);
        return response()->json($student);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'class_id'=> 'required',
            'section_id'=> 'required',
            'name'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required',
            'email'=> 'required ',
            'address'=> 'required',
            'password'=> 'required',
        ]);
        $student = array();
        $student['class_id']=  $data['class_id'];
        $student['section_id'] = $data['section_id'];
        $student['name'] = $data['name'];
        $student['gender'] = $data['gender'];
        $student['phone'] = $data['phone'];
        $student['email'] = $data['email'];
        $student['address'] = $data['address'];
        $student['photo'] = $data['photo'];
        $student['password'] = bcrypt($data['password']);
        Student::where('id',$id)->update($student);
        return response('Updated Data Successfully!');
    }
    public function destroy($id)
    {
        $img = Student::findorfail($id)->first();
        $image_path = $img->photo;
        unlink($image_path);
        Student::findorfail($id)->delete();
        return response('Deleted Data Successfully!');
    }
}
