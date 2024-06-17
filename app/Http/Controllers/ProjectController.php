<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Folder;
use App\Models\Project;
use App\Services\ProjectService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->projects = new Project();

    }

    public function index($id)
    {


        $user = Auth::user();
        $folders  =  $user->folders;
        $folderName = Folder::find($id);

        $projectName = Project::find($id);
        $title = $projectName->name;

        $projects = Project::all();
        $tags = $user->tags;
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();
        $tasks = $user->tasks()->orderBy('completed_at')->orderBy('created_at', 'desc')->get();
        $tasks->transform(function ($task) {
            $task->due_date_at = Carbon::parse($task->due_date_at);

            return $task;
        });


        return view('project', ['tasks' => $tasks , 'user' => $user, 'title' => $title ,'folders' => $folders,
            'projectsWithoutFolder' => $projectsWithoutFolder,'projects' => $projects,'projectName' => $projectName, 'tags' => $tags,'folderName' => $folderName]);
    }
    public function store(ProjectRequest $request,ProjectService $projectService){
        $user = Auth::user();
        $project = $projectService->createProject(
            $user->id,
            $name = $request->input('name'),
            $folder = $request->input('folder_id'),

        );



        return redirect()->back();
    }
}
