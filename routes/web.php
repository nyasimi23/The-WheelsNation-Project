<?php

use App\Http\Controllers\CarEventsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Models\CarEvents;
use App\Models\Cars;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Show Cars
Route::get('/cars', [CarsController::class, 'index']);


//Show Create Form for New Car 
Route::get('/cars/create', [CarsController::class, 'create'])->middleware('auth');

// Creat New Car
Route::post('/cars' , [CarsController::class ,'store'])->middleware('auth');

// Show Edit Form
Route::get('/cars/{cars}/edit', [CarsController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/cars/{cars}', [CarsController::class, 'update'])->middleware('auth');

// Single  Car Listing
Route::get('/cars/{cars}', [CarsController::class, 'show']);

// Show Car Events
Route::get('/carEvents', [CarEventsController::class, 'index']);

// Show create form for CarEvents
Route::get('/carEvents/create', [CarEventsController::class, 'create'])->middleware('auth');

// Creat New carEvents
Route::post('/carEvents' , [CarEventsController::class ,'store'])->middleware('auth');


// Single CarEvent Listing
Route::get('/carEvents/{carEvents}', [CarEventsController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);



// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



//Store and Delete comments
Route::resource('comments', CommentController::class)
->only(['store', 'destroy']);

// Route::post('comments' , [CommentController::class , 'store']);