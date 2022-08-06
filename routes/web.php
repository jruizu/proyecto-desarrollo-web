<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;


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
    return redirect('/login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::prefix('companies')->group(function (){
      Route::get('/', [CompanyController::class, 'index'])->name('companies');
      Route::get('edit/{company}', [CompanyController::class, 'edit']);
      Route::get('/create', [CompanyController::class, 'create']);
      Route::post('/store', [CompanyController::class, 'store']);
      Route::post('/update/{company}', [CompanyController::class, 'update']);
      Route::post('/delete/{company}', [CompanyController::class, 'delete']);
    });
    Route::prefix('employees')->group(function (){
        Route::get('/', [EmployeesController::class, 'index'])->name('employees');
        Route::get('edit/{employee}', [EmployeesController::class, 'edit']);
        Route::get('/create', [EmployeesController::class, 'create']);
        Route::post('/store', [EmployeesController::class, 'store']);
        Route::post('/update/{employee}', [EmployeesController::class, 'update']);
        Route::post('/delete/{employee}', [EmployeesController::class, 'delete']);
      });
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
