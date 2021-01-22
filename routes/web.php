<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Create_u_id;
use App\Http\Controllers\admin\Promot_id;


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
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Admin 
// Create User id 
Route::get("create_u_id",[Create_u_id::class,"index"])->name("create_u_id");
Route::post("create_u_id",[Create_u_id::class,"store"])->name("create_id");
Route::get("delete_user/{id}",[Create_u_id::class,"delete"]);
// Promot id 
Route::get("promot_id",[Promot_id::class,"index"])->name("promot_id");
Route::post("promot_id",[Promot_id::class,"store"])->name("promot_id");
Route::get("delete_promot/{id}",[Promot_id::class,"delete"]);