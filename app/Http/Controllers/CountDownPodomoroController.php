<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;

class CountDownPodomoroController extends Controller
{
    public function index()
    {

        return view('layout.countdown');
    }

    public function show($id)
    {
        $task = Task::find($id);

        return view('layout.countdown', ['task' => $task]);
    }
    public function completeTask($id , TaskService $taskService)
    {
        $taskService->completedTask($id);
        return redirect('/home');
    }
}
