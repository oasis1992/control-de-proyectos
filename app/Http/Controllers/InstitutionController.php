<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;

class InstitutionController extends Controller
{
    public function store(Request $request){
        $institution = new Institution();
        $institution->name = $request->name;
        $institution->type = $request->type_id;
        $institution->save();
        return redirect()->route('admin.institution.index');
    }

    public function create(Request $request){
        return View('admin.institutions.create');
    }
    
    public function update(Request $request, $id){
        $institution = Institution::find($id);
        $institution->name = $request->name;
        $institution->type = $request->type_id;
        $institution->save();

        return redirect()->route('admin.institution.index');
    }
    
    public function edit($id){
        $institution = Institution::find($id);
        return View('admin.institutions.edit')->with('institution', $institution);
    }
    
    public function index(){
        $institutions = Institution::all();
        return view('admin.institutions.index')->with('institutions', $institutions);
    }

    public function destroy($id){
        $institution = Institution::find($id);
        $institution->delete();
        return redirect()->route('admin.institution.index');
    }
}
