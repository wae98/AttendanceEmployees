<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\WorkplacesController;
use App\Http\Controllers\ManagersController;

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
    return redirect()->route('login');
});

Route::resource('dashboard', DashboardController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('usuarios', UsersController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('roles', RolesController::class)->middleware(['auth', 'verified']);

Route::resource('employees', EmployeesController::class)->middleware(['auth', 'verified']);

Route::resource('departments', DepartmentsController::class)->middleware(['auth', 'verified']);

Route::resource('statuses', StatusesController::class)->middleware(['auth', 'verified']);

Route::resource('workplaces', WorkplacesController::class)->middleware(['auth', 'verified']);

Route::resource('attendances', AttendancesController::class)->middleware(['auth', 'verified']);

Route::resource('managers', ManagersController::class)->middleware(['auth', 'verified']);


Route::middleware(['auth:sanctum', 'verified'])->get('register', function () {
    return view('inicio');
})->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('forgot-password', function () {
    return view('inicio');
})->name('forgot-password');
