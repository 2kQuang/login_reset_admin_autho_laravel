<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employee
Route::get('employee',[EmployeeController::class,'admin'])->name('employee.admin');
Route::get('employee/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('employee/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('employee/update/{id}/{role_id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('employee/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
Route::get('employee/delete/{id}',[EmployeeController::class,'destroy'])->name('employee.delete');


// Categories
Route::get('categories',[CategoriesController::class,'admin'])->name('categories.admin');
Route::get('categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('categories/store',[CategoriesController::class,'store'])->name('categories.store');
Route::get('categories/update/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::post('categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('categories/delete/{id}',[CategoriesController::class,'destroy'])->name('categories.delete');


// Maps
Route::get('maps',[MapsController::class,'admin'])->name('maps.admin');
Route::get('maps/create',[MapsController::class,'create'])->name('maps.create');
Route::post('maps/store',[MapsController::class,'store'])->name('maps.store');
Route::get('maps/update/{id}/{id_categori}',[MapsController::class,'edit'])->name('maps.edit');
Route::post('maps/update/{id}',[MapsController::class,'update'])->name('maps.update');
Route::get('maps/delete/{id}',[MapsController::class,'destroy'])->name('maps.delete');


// Products
Route::get('products',[ProductController::class,'admin'])->name('products.admin');
Route::get('products/create',[ProductController::class,'create'])->name('products.create');
Route::post('products/store',[ProductController::class,'store'])->name('products.store');
Route::get('products/update/{id}/{id_categori}/{id_address}',[ProductController::class,'edit'])->name('products.edit');
Route::post('products/update/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('products/delete/{id}',[ProductController::class,'destroy'])->name('products.delete');



// User
