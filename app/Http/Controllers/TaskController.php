<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Folder;
use App\Models\Project;
use App\Models\Task;
use App\Services\TaskService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->tasks = new Task();

    }

    public function index()
    {

        $title = 'Home';
        $user = Auth::user();
        $folders  =  $user->folders;
        $projects = $user->projects;

        $tags = $user->tags;
//        $projects = Project::all();
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();
        $tasks = $user->tasks()->orderBy('completed_at')->orderBy('created_at', 'desc')->get();
        $tasks->transform(function ($task) {
        $task->due_date_at = Carbon::parse($task->due_date_at);

        return $task;
        });

        return view('index', ['tasks' => $tasks , 'user' => $user, 'title' => $title ,
            'folders' => $folders, 'projectsWithoutFolder' => $projectsWithoutFolder,'projects' => $projects, 'tags' => $tags]);
    }

    public function store(StoreTaskRequest $request, TaskService $taskService)
    {
        $user = Auth::user();
        $task = $taskService->createTask(
            $user->id,
             $request->input('taskname'),
            $request->input('quantity_podomoro') ?? 1,
             $request->input('select_date'),
            $request->input('folder_id'),
            $request->input('project_id'),
        );


        return redirect('/home');

    }
    public function storeFolderTask(StoreTaskRequest $request, TaskService $taskService)
    {
        $user = Auth::user();
        $projects = Project::all();
        $projectId = $request->input('project_id');
        $folderId = Project::where('id', $projectId)->value('folder_id');
        $task = $taskService->createTask(
            $user->id,
            $request->input('taskname'),
            $request->input('quantity_podomoro') ?? 1,
            $request->input('select_date'),
            $projectId,
            $folderId ,

        );


        return redirect()->back();

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = Auth::user();

        $task = Task::where('id', $id)->first();

        return view('edit', ['task' => $task ,'user' => $user] );
    }

    public function update(UpdateTaskRequest $request, $id)
    {

        $projectId = $request->input('project_id');
        $updateTask = [
            'name' => $request->input('taskname'),
            'quantity_podomoro' => $request->input('quantity_podomoro'),
            'due_date_at' => $request->input('select_date'),
            'updated_at' => Carbon::now(),
            'project_id' => $request->input('project_id'),
            'folder_id' => Project::where('id', $projectId)->value('folder_id'),
            'priority' => $request->input('priority'),
            'note' => $request->input('note'),
        ];
        $this->tasks->updateTask($updateTask, $id);
        $task = Task::findOrFail($id);
        $task->update($updateTask);

        $tags = $request->input('tags', []);
        $task->tags()->sync($tags);
        return redirect()->back();
    }

    public function completeTask($id , TaskService $taskService)
    {
         $taskService->completedTask($id);
        return redirect()->back();
    }
    public function completeTaskPomodoro($id , TaskService $taskService)
    {
        $taskService->completedTask($id);
        return redirect('home');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
//        dd($task);
        $task->delete();

        return redirect()->back();
    }
    public function cancelCompletedTask($id, TaskService $taskService)
    {
        $taskService->cancelCompletedTask($id);
        return redirect()->back();
    }
}
