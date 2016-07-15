<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contributor;
use App\Project;
use App\ExtraInformation;

class ContributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributors = Contributor::all();
        return View('admin.contributors.index')->with('contributors', $contributors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.contributors.create');
    }

    public function add(Request $request)
    {
        $contributor = new Contributor();
        $contributor->fill($request->all());
        $contributor->name_complete = $request->get('name').' '.$request->get('first_name').' '.$request->get('last_name');
        $contributor->save();
        if($request->get('type') == 'interno'){
            $extraInformation = new ExtraInformation();
            $extraInformation->fill($request->all());
            $extraInformation->contributor_id = $contributor->id;
            $extraInformation->save();
        }
        
        return redirect()->route('admin.colaboradores.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::find($request->project_id);
        $project->contributors()->sync($request->contributors);
        $project->contributors();

        return redirect()->route('admin.proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contributor = Contributor::find($id);
        $contributor->delete();

        return redirect()->route('admin.colaboradores.index');
    }
}
