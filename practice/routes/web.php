<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Models\Family;
use App\Models\Hospital;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', [AuthController::class, 'index'])->name('auth.dashboard');

// Student routes
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
    Route::put('/update/{student}', [StudentController::class, 'update'])->name('update'); // Changed to PUT for update
    Route::delete('/delete/{student}', [StudentController::class, 'delete'])->name('delete'); // Changed to DELETE
});

// Family routes
Route::prefix('family')->name('family.')->group(function () {
    Route::get('/', [FamilyController::class, 'index'])->name('index');
    Route::get('/create', [FamilyController::class, 'create'])->name('create');
    Route::post('/store', [FamilyController::class, 'store'])->name('store');
    Route::get('/edit/{family}', [FamilyController::class, 'edit'])->name('edit');
    Route::put('/update/{family}', [FamilyController::class, 'update'])->name('update'); // Changed to PUT for update
    Route::delete('/delete/{family}', [FamilyController::class, 'delete'])->name('delete'); // Changed to DELETE
});

/// Hospital Routes
Route::prefix('hospital')->name('hospital.')->group(function () {
    Route::get('/', [HospitalController::class, 'index'])->name('index');
    Route::get('/create', [HospitalController::class, 'create'])->name('create');
    Route::post('/store', [HospitalController::class, 'store'])->name('store'); 
    Route::get('/edit/{hospital}', [HospitalController::class, 'edit'])->name('edit');
    Route::put('/update/{hospital}', [HospitalController::class, 'update'])->name('update'); 
    Route::delete('/delete/{hospital}', [HospitalController::class, 'destroy'])->name('destroy'); 
});
// Computer Routes
Route::prefix('computer')->name('computer.')->group(function (){
    Route::get('/',[ComputerController::class, 'index'])->name('index');
    Route::get('/create',[ComputerController::class,'create'])->name('create');
    Route::post('/store', [ComputerController::class, 'store'])->name('store');
    Route::get('/edit/{computer}', [ComputerController::class, 'edit'])->name('edit');
    Route::put('/update/{computer}', [ComputerController::class,'update'])->name('update');
    Route::delete('/delete/{computer}',[ComputerController::class, 'destroy'])->name('destroy');
});
// School Routes
Route::prefix('school')->name('school.')->group(function (){
    
Route::resource('school', SchoolController::class);
    Route::get('/', [SchoolController::class,'index'])->name('index');
    Route::get('/create',[SchoolController::class, 'create'])->name('create');
    Route::post('/store', [SchoolController::class, 'store'])->name('store');
    Route::get('/edit/{school}',[SchoolController::class, 'edit'])->name('edit');
    Route::put('/update/{school}',[SchoolController::class, 'update'])->name('update');
    Route::delete('/delete/{school}',[SchoolController::class, 'destroy'])->name('destroy');
});

// Flower Routes
Route::prefix('flower')->name('flower.')->group(function (){
    Route::get('/',[FlowerController::class, 'index'])->name('index');
    Route::get('/create',[FlowerController::class,'create'])->name('create');
    Route::post('/store', [FlowerController::class, 'store'])->name('store');
    Route::get('/edit/{flower}', [FlowerController::class, 'edit'])->name('edit');
    Route::put('/update/{flower}', [FlowerController::class,'update'])->name('update');
    Route::delete('/delete/{flower}',[FlowerController::class, 'destroy'])->name('destroy');
});
