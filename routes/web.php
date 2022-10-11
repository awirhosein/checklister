<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\Admin\{ChecklistGroupController, ChecklistController, PageController, TaskController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin
    Route::prefix('admin')->middleware('admin')->as('admin.')->group(function () {
        Route::resource('pages', PageController::class)->only(['edit', 'update']);
        Route::resource('checklist-groups', ChecklistGroupController::class)->except(['index', 'show']);
        Route::resource('checklist-groups.checklists', ChecklistController::class)->except(['index', 'show']);
        Route::resource('checklists.tasks', TaskController::class);
    });
});
