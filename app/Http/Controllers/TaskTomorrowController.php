<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\TaskService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskTomorrowController extends Controller
{
    public function __construct()
    {
        $this->tasks = new Task();

    }
    public function index()
    {
        $user = Auth::user();
        $title = 'Tomorrow';
        $folders  =  $user->folders;
        $tags = $user->tags;
        $projects = Project::all();
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();

        $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
        $tasks->transform(function ($task) {
            $task->due_date_at = Carbon::parse($task->due_date_at);
            return $task;
        });
        $tasks = $tasks->filter(function ($task) {
            return $task->due_date_at->isTomorrow();
        });

        return view('tomorrow', ['tasks' => $tasks , 'user' => $user, 'title' => $title,'folders' => $folders,
            'projects' => $projects, 'projectsWithoutFolder' => $projectsWithoutFolder, 'tags' => $tags]);
    }
    public function store(StoreTaskRequest $request, TaskService $taskService)
    {
        $user = Auth::user();
        $dueDate = Carbon::tomorrow()->toDateString();
        $projects = Project::all();
        $projectId = $request->input('project_id');
        $folderId = Project::where('id', $projectId)->value('folder_id');
        $task = $taskService->createTask(
            $user->id,
            $name = $request->input('taskname'),
            $quantityPodomoro = $request->input('quantity_podomoro') ?? 1,
            $dueDate ,
            $projectId ,
            $folderId ,
        );
        return redirect('home/tomorrow');

    }
}
