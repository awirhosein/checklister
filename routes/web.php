<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\User\ChecklistController as UserChecklistController;
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

Route::redirect('/', 'welcome');

Auth::routes();


Route::middleware(['auth', 'save_last_action_timestamp'])->group(function () {
    Route::get('/welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
    Route::get('/consultation', [\App\Http\Controllers\PageController::class, 'consultation'])->name('consultation');
    Route::get('/checklists/{checklist}', [UserChecklistController::class, 'show'])->name('user.checklists.show');

    // Admin
    Route::prefix('admin')->middleware('admin')->as('admin.')->group(function () {
        Route::resource('pages', PageController::class)->only(['edit', 'update']);
        Route::resource('checklist-groups', ChecklistGroupController::class)->except(['index', 'show']);
        Route::resource('checklist-groups.checklists', ChecklistController::class)->except(['index', 'show']);
        Route::resource('checklists.tasks', TaskController::class);
    });
});
