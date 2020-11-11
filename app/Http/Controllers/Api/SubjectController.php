<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);
        Subject::create($request->all());
        return response('Inserted Subject Data Successfully!');
    }
    public function show($id)
    {
        $subject =Subject::findorfail($id);
        return response()->json($subject);
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);
        Subject::findorfail($id)->update($request->all());
        return response('Updated Successfully!');
    }
    public function destroy($id)
    {
        Subject::findorfail($id)->delete();
        return response('Deleted Successfully!');
    }
}