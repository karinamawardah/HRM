<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/','EmployeesController');

Route::resource('/tambah','EmployeesController');

Route::resource('/divisions','DivisionsController');

Route::resource('/onleaves','onleavesController');

Route::resource('/reimbursments','reimbursmentsController');
