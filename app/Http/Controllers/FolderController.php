<?php

namespace App\Http\Controllers;

use App\Http\Requests\FolderRequest;
use App\Models\Folder;
use App\Models\Project;
use App\Services\FolderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->folders = new Folder();
    }

    public function index($id)
    {
        $user = Auth::user();
        $folders  =  $user->folders;
        $folderName = Folder::find($id);
        $title = $folderName->name;
        $projectsFolder = $folderName->projects;
        $tags = $user->tags;
        $projects = Project::all();

        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();

        $tasks = $user->tasks()->orderBy('completed_at')->orderBy('created_at', 'desc')->get();
        $tasks->transform(function ($task) {
            $task->due_date_at = Carbon::parse($task->due_date_at);

            return $task;
        });


        return view('folder', ['tasks' => $tasks , 'user' => $user, 'title' => $title ,'folders' => $folders,
            'projectsWithoutFolder' => $projectsWithoutFolder,'projects' => $projects,'projectsFolder'=> $projectsFolder, 'folderName'=>$folderName, 'tags' => $tags,]);
    }

    public function edit()
    {

    }
    public function store(FolderRequest $request,FolderService $folderService){
        $user = Auth::user();
        $folder = $folderService->createFolder(
            $user->id,
            $name = $request->input('name'),

        );



        return redirect()->back();
    }

    public function update(FolderRequest $request, $id)
    {
        $folder = Folder::findOrFail($id);
        $folder->name = $request->input('name');
        $folder->save();
        $selectedProjects = $request->input('projects', []);
        // Cập nhật folder_id của các project
        Project::where('folder_id', $id)->update(['folder_id' => null]); // Bỏ folder_id của các project hiện tại
        Project::whereIn('id', $selectedProjects)->update(['folder_id' => $id]); // Cập nhật folder_id cho các project được chọn

        return redirect()->back();
    }
    public function destroy($id)
    {
        $folder = Folder::find($id);

        $folder->delete();
        return redirect('home');
    }
}
