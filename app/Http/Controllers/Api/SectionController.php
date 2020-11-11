<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::all();
        return response()->json($section);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',
        ]);
        Section::create($request->all());
        return response('Inserted Section Data Successfully!');
    }
    public function show($id)
    {
        $section = Section::findorfail($id);
        return response()->json($section);
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',
        ]);
        Section::findorfail($id)->update($request->all());
        return response('Updated Successfully!');
    }
    public function destroy($id)
    {
        Section::findorfail($id)->delete();
        return response('Deleted Successfully!');
    }
}
