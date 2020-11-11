<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Sclass;
use Illuminate\Http\Request;
use Validator;
class SclassController extends Controller
{
    public function index()
    {
        $sclass = Sclass::select('id','class_name')->get();
        return response()->json($sclass);
    }
    public function store(Request $request)
    {
        $data = $request->all();  
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);
        $sclass = new Sclass;
        $sclass->class_name = $data['class_name'];
        $sclass->save();
        return response('Inserted Data Successfully!');
        
    }
    public function show($id)
    {
        $show = Sclass::find($id)->first();
        return response()->json($show);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);
        Sclass::find($id)->update(['class_name'=>$data['class_name']]);
        return response('Updated Data Successfully!');
    }
    public function destroy($id)
    {
        Sclass::find($id)->delete();
        return response('Deleted Successfully!');
    }
}
