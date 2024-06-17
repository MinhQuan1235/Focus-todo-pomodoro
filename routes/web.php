<?php

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\CountDownPodomoroController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskTodayController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskTomorrowController;
use App\Http\Controllers\TaskThisWeekController;
use App\Http\Controllers\TaskPlannedController;
use App\Http\Controllers\TaskCompletedController;
use App\Http\Controllers\TagController;



use Illuminate\Support\Facades\Route;

Route::get('/sign-in', [SignInController::class, 'index'])->name('sign-in');
Route::post('/sign-in', [SignInController::class, 'authenticate'])->name('login');

Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign-up');
Route::post('/sign-up', [SignUpController::class, 'store'])->name('sign-up');
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/home')->middleware('auth:web')->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    // tạo task (task)
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/', [TaskController::class, 'store'])->name('create');
    // tạo task (today)
    Route::get('/today', [TaskTodayController::class, 'index'])->name('create.today');
    Route::post('/today', [TaskTodayController::class, 'store'])->name('store.today');

    // tomorrow
    Route::get('/tomorrow', [TaskTomorrowController::class, 'index'])->name('create.tomorrow');
    Route::post('/tomorrow', [TaskTomorrowController::class, 'store'])->name('store.tomorrow');

    //this week
    Route::get('/this-week', [TaskThisWeekController::class, 'index'])->name('create.week');
    Route::post('/this-week', [TaskThisWeekController::class, 'store'])->name('store.thisWeek');
    //planned

    Route::get('/planned', [TaskPlannedController::class, 'index'])->name('create.planned');
    Route::post('/planned', [TaskPlannedController::class, 'store'])->name('store.planned');
    // complete
    Route::get('/completed', [TaskCompletedController::class, 'taskCompleted'])->name('tasks.completed');



    // edit task
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('home.edit');
    Route::post('/edit/{id}', [TaskController::class, 'update'])->name('task.update');

    //
    Route::get('/countdown/{id}', [CountDownPodomoroController::class, 'index'])->name('countdown');
    Route::get('/countdown/{id}', [CountDownPodomoroController::class, 'show'])->name('countdown.show');
    Route::post('/countdown/{id}', [CountDownPodomoroController::class, 'completeTask']);

    // complete
    Route::post('/completed/task/{id}', [TaskController::class, 'completeTask'])->name('task.completed');
    Route::post('/completed/task/pomodoro/{id}', [TaskController::class, 'completeTaskPomodoro'])->name('pomodoro.completed');
    // cancel complete
    Route::post('/uncompleted/task/{id}', [TaskController::class, 'cancelCompletedTask'])->name('task.uncompleted');

    //delete
    Route::post('/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');

    // account edit , sign out,
    Route::get('/Account/{id}', [AccountController::class, 'edit'])->name('Account');
    Route::post('/Account/{id}', [AccountController::class, 'update']);
    Route::post('/Sign-out', [AccountController::class, 'signOut'])->name('Account.sign-out');

    // create folder
    Route::post('/folder', [FolderController::class, 'store'])->name('create.folder');
    Route::post('/folder/task', [TaskController::class, 'storeFolderTask'])->name('create.folderTask');

    Route::get('/folder/{id}', [FolderController::class, 'index'])->name('index.folder');


    Route::post('/folder/{id}', [FolderController::class, 'update'])->name('update.folder');
    Route::post('/folder/deleted/{id}', [FolderController::class, 'destroy'])->name('folder.delete');


    Route::post('/project', [ProjectController::class, 'store'])->name('create.project');
    Route::get('/project/{id}', [ProjectController::class, 'index'])->name('index.project');

    Route::post('/tag', [TagController::class, 'store'])->name('create.tag');

    Route::get('/tag/{id}', [TagController::class, 'index'])->name('index.tag');


});
Route::get('/test', function () {
    return view('tes1');
});

//Route::get('/has-session', function () {
//    return 'login success';
//})->middleware('auth:web');
//
//Route::get('/home', function () {
//
//})
