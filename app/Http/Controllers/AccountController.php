<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->users = new User();

    }
    public  function  index(){

        $user = Auth::user();

//        return "đây là trang account";
        return view('account-setting', [ 'user' => $user]);
    }
    public function show($id)
    {

    }
    public  function  edit($id){

        $user = Auth::user();
        $folders  =  $user->folders;
        $projects = Project::all();
        $tags = $user->tags;
        $projectsWithoutFolder = Project::where('user_id', $user->id)->whereNull('folder_id')->get();


//        $task = User::where('id', $id)->first();

        return view('account-setting', ['user' => $user, 'folders' => $folders,'projectsWithoutFolder' => $projectsWithoutFolder,'projects' => $projects , 'tags' => $tags] );
    }
    public function update(Request $request, $id)
    {


        $updateUser = [
            'name' => $request->input('name'),
        ];
        $this->users->updateUser($updateUser, $id);

        return redirect('/home');
    }
    public function signOut(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
