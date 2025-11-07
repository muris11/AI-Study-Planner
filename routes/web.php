<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlannerController;
use App\Http\Controllers\WelcomeController;
use App\Models\PlannerTask;
use App\Models\StudyBlock;

// Scope route-model binding to the authenticated user so foreign IDs
// return 404 instead of triggering 403 in controllers.
Route::bind('task', function ($value) {
    $uid = session('user_id');
    return PlannerTask::where('id', $value)->where('user_id', $uid)->firstOrFail();
});

Route::bind('block', function ($value) {
    $uid = session('user_id');
    return StudyBlock::where('id', $value)->where('user_id', $uid)->firstOrFail();
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/help', [WelcomeController::class, 'help'])->name('help');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.session','throttle:60,1'])->group(function () {
    Route::get('/planner', [PlannerController::class, 'dashboard'])->name('planner.dashboard');
    Route::get('/planner/tasks', [PlannerController::class, 'tasks'])->name('planner.tasks');
    Route::post('/planner/tasks', [PlannerController::class, 'storeTask'])->name('planner.tasks.store');
    Route::get('/planner/tasks/{task}', [PlannerController::class, 'showTask'])->name('planner.tasks.show');
    Route::get('/planner/tasks/{task}/edit', [PlannerController::class, 'editTask'])->name('planner.tasks.edit');
    Route::put('/planner/tasks/{task}', [PlannerController::class, 'updateTask'])->name('planner.tasks.update');
    Route::delete('/planner/tasks/{task}', [PlannerController::class, 'deleteTask'])->name('planner.tasks.delete');
    Route::post('/planner/score', [PlannerController::class, 'scoreTasks'])->name('planner.tasks.score');
    Route::get('/planner/schedule', [PlannerController::class, 'scheduleGet'])->name('planner.schedule.get');
    Route::post('/planner/schedule', [PlannerController::class, 'schedule'])->name('planner.schedule');
    Route::post('/planner/block/{id}/complete', [PlannerController::class, 'completeBlock'])->name('planner.block.complete');
    Route::patch('/planner/block/{id}/complete', [PlannerController::class, 'completeBlock'])->name('planner.block.complete.patch');
    Route::get('/planner/block/{id}/complete', [PlannerController::class, 'completeGet'])->name('planner.block.complete.get');
    Route::get('/planner/block/{block}', [PlannerController::class, 'showBlock'])->name('planner.block.show');
    Route::delete('/planner/block/{block}', [PlannerController::class, 'deleteBlock'])->name('planner.block.delete');
    Route::get('/explain/{taskId}', [PlannerController::class, 'explain'])->name('planner.explain');
    Route::get('/test-email', [PlannerController::class, 'testEmail'])->name('test.email');

    Route::get('/planner/prefs', [PlannerController::class, 'prefs'])->name('planner.prefs');
    Route::post('/planner/prefs', [PlannerController::class, 'savePrefs'])->name('planner.prefs.save');

    Route::get('/planner/tutorial', [PlannerController::class, 'tutorial'])->name('planner.tutorial');

});
