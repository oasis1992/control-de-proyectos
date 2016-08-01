<?php

namespace App\Http\Controllers;

use App\Project;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Requests;

class StatusController extends Controller
{
    public function change_status(Request $request, $project_id){
        $project = Project::find($project_id);
        $status = Status::find($request->status);
        $project->status()->associate($status);
        $project->save();

        return redirect()->route('admin.projects.panel', ['id' => $project_id]);
    }
}
