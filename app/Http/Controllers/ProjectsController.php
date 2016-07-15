<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status;
use App\TypeProject;
use App\Project;
use App\Contributor;
use App\Http\Requests\ProjectRequest;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$type1 = new TypeProject();
        $type1->name = "Invitación";
        $type1->save();

        $type1 = new TypeProject();
        $type1->name = "Institucional";
        $type1->save();

        $type1 = new TypeProject();
        $type1->name = "Interno";
        $type1->save();


        $type1 = new TypeProject();
        $type1->name = "Doctorado";
        $type1->save();


        $type1 = new TypeProject();
        $type1->name = "Otro";
        $type1->save();

        $status = new Status();
        $status->name = "Vigente";
        $status->save();

        $status = new Status();
        $status->name = "No vigente";
        $status->save();

        $status = new Status();
        $status->name = "Concluido";
        $status->save();

        $status = new Status();
        $status->name = "No aprobado";
        $status->save();

        $status = new Status();
        $status->name = "Cancelado";
        $status->save();*/

        $projects = Project::Search($request->title)->orderBy('id','ASC')->paginate(25);
        $projects->each(function($projects) {
            $projects->typeProject;
            $projects->status;
        });
        return View('admin.projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $status = Status::get()->lists('name','id');
        $type_project = TypeProject::get()->lists('name','id');
        return View('admin.projects.create')->with('status', $status)
        ->with('type_project', $type_project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project($request->all());
        $contributors_internos = Contributor::where('type','=','interno')->orderBy('name_complete','ASC')->lists('name_complete','id');

        $contributors_externos = Contributor::where('type','=','externo')->orderBy('name_complete','ASC')->lists('name_complete','id');

        $project->save();
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
        //
    }

    public function panel($id)
    {
        $project = Project::find($id);
        $interno = 0;
        $externo = 0;
        $total = 0;
        foreach ($project->financings as $financing){
            
            if($financing->institution->type == "interno"){
                $interno = $financing->mount + $interno;
            }

            if($financing->institution->type == "externo"){
                $externo = $financing->mount + $externo;
            }
        }

        $total = $interno + $externo;

        return View('admin.projects.panel.index')->with('project', $project)->with('interno', $interno)->with('externo',$externo)->with('total', $total);
    }

    public function edit_collaboratores($id){
        $project = Project::find($id);

        $my_contributors_internos = array();
        $my_contributors_externos = array();
        $contributors_internos = Contributor::where('type','=','interno')->orderBy('name_complete','ASC')->lists('name_complete','id');
        $contributors_externos = Contributor::where('type','=','externo')->orderBy('name_complete','ASC')->lists('name_complete','id');
        foreach ($project->contributors as $contributor){
            if($contributor->type == "interno"){
                $my_contributors_internos[] = $contributor->id;
            }
            if($contributor->type == "externo"){
                $my_contributors_externos[] = $contributor->id;
            }
        }
        return View('admin.contributors.add')->with('project', $project)
        ->with('contributors_internos', $contributors_internos)->with('contributors_externos', $contributors_externos)
            ->with('my_contributors_internos', $my_contributors_internos)
            ->with('my_contributors_externos', $my_contributors_externos);
    }
    
    public function update_collaboratores(Request $request){
        $project = Project::find($request->project_id);
        $project->contributors()->sync($request->contributors);
        $project->contributors();
            return redirect()->to('admin/proyectos/'.$project->id.'/panel');
    }


    /* comentado por si se llegara a requerir el metodo */
//    public function destroyContributorPanel($id, $project_id){
//        $project = Project::find($project_id);
//        $project->contributors;
//        foreach ($project->contributors as $contributor){
//            if($contributor->id == $id){
//                $contributor->delete();
//            }
//        }
//     //   dd($project);
//        //$contributor = Contributor::find($id);
//      //  $contributor->delete();
//        return redirect('admin/proyectos/'.$project_id.'/panel');
//    }
}
