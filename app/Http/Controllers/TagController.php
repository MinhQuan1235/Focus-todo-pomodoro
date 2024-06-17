<?php

namespace App\Http\Controllers;


use App\Http\Requests\TagRequest;
use App\Models\Folder;
use App\Models\Project;
use App\Models\Tag;
use App\Services\TagService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function __construct()
    {
        $this->tags = new Tag();
    }
    public function index($id)
    {


        $user = Auth::user();
        $folders  =  $user->folders;
        $folderName = Folder::find($id);
        $tagName = Tag::find($id);
        $projectName = Project::find($id);
        $title = $tagName->name;
        $projects = Project::all();
        $tags = $user->tags;
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();
        $tasks = $tagName->tasks()->where('user_id', $user->id)->orderBy('completed_at')->orderBy('created_at', 'desc')->get();
        $tasks->transform(function ($task) {
            $task->due_date_at = Carbon::parse($task->due_date_at);
            return $task;
        });



        return view('tag', ['tasks' => $tasks , 'user' => $user, 'title' => $title ,'folders' => $folders,
            'projectsWithoutFolder' => $projectsWithoutFolder,'projects' => $projects,'projectName' => $projectName,
            'tags' => $tags,'folderName' => $folderName, 'tagName' => $tagName] ,);
    }
    public function store(TagRequest $request , TagService $tagService){
        $user = Auth::user();
        $task = $tagService->createTag(
            $user->id,
            $request->input('name'),
        );
        return redirect()->back();
    }



}
