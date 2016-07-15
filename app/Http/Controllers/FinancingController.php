<?php

namespace App\Http\Controllers;

use App\Financing;
use App\Institution;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class FinancingController extends Controller
{
    public function index(){

    }

    public function create($id){
        $project = Project::find($id);
        $institutions = Institution::orderBy('name','ASC')->lists('name','id');
        return View('admin.financing.create')->with('project', $project)->with('institutions', $institutions);
    }

    public function store(Request $request){
        $financing = new Financing();

        $financing->name = $request->name;
        $financing->mount = $request->mount;
        $financing->project_id = $request->project_id;
        $financing->institution_id = $request->institution_id;
        $financing->save();
        
        return redirect('proyectos/'.$request->project_id.'/panel');
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
