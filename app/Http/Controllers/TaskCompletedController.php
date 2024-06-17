<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCompletedController extends Controller
{
    public function taskCompleted()
    {
        $user = Auth::user();
        $title = 'Task Completed';
        $folders  =  $user->folders;
        $projects = Project::all();
        $tags = $user->tags;
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();

        $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
        $tasks->transform(function ($task) {
            $task->due_date_at = Carbon::parse($task->due_date_at);
            return $task;
        });
        $groupedTasks = $tasks->groupBy(function($task) {
            return \Carbon\Carbon::parse($task->due_date_at)->format('d-m-Y');
        });
        $tasks = $tasks->filter(function ($task) {
            return $task->isCompleted();
        });

        return view('completed', ['tasks' => $tasks , 'user' => $user, 'title' => $title,'folders' => $folders,
            'projects' => $projects, 'projectsWithoutFolder' => $projectsWithoutFolder,'groupedTasks' => $groupedTasks, 'tags' => $tags]);
    }
}
