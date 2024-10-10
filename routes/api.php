<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;

Route::middleware('auth:sanctum')->group(function () {
Route::post('user', [UserController::class, 'store']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::get('users', [UserController::class, 'index']);
Route::post('user/update', [UserController::class, 'update']);
Route::post('user/delete', [UserController::class, 'destroy']);

Route::post('project', [ProjectController::class, 'store']);
Route::get('project/{id}', [ProjectController::class, 'show']);
Route::get('projects', [ProjectController::class, 'index']);
Route::post('project/update', [ProjectController::class, 'update']);
Route::post('project/delete', [ProjectController::class, 'destroy']);

Route::post('timesheet', [TimesheetController::class, 'store']);
Route::get('timesheet/{id}', [TimesheetController::class, 'show']);
Route::get('timesheets', [TimesheetController::class, 'index']);
Route::post('timesheet/update', [TimesheetController::class, 'update']);
Route::post('timesheet/delete', [TimesheetController::class, 'destroy']);
});