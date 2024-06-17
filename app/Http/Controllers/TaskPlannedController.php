<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Services\TaskService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskPlannedController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $title = 'Planned';
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
        $folders  =  $user->folders;
        $projects = Project::all();
        $tags = $user->tags;
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();

        $tasks->transform(function ($task) {
            $task->due_date_at = Carbon::parse($task->due_date_at);
            return $task;
        });
        $groupedTasks = $tasks->groupBy(function($task) {
            return \Carbon\Carbon::parse($task->due_date_at)->format('d-m-Y');
        });
        $tasks = $tasks->filter(function ($task) {
            return $task->due_date_at->isCurrentMonth();
        });

        return view('planned', ['tasks' => $tasks , 'user' => $user, 'title' => $title,'folders' => $folders,
            'projects' => $projects, 'projectsWithoutFolder' => $projectsWithoutFolder,'groupedTasks' => $groupedTasks, 'tags' => $tags]);
    }
    public function store(StoreTaskRequest $request, TaskService $taskService)
    {
        $user = Auth::user();

        $projects = Project::all();
        $projectId = $request->input('project_id');
        $folderId = Project::where('id', $projectId)->value('folder_id');
        $task = $taskService->createTask(
            $user->id,
            $name = $request->input('taskname'),
            $quantityPodomoro = $request->input('quantity_podomoro') ?? 1,
            $dueDate =$request->input('select_date'),
            $projectId ,
            $folderId ,
        );
        return redirect('home/planned');

    }
}
