<?php

use App\Http\Controllers\admin\Create_u_id;
use App\Http\Controllers\admin\Promot_id;
use App\Http\Controllers\admin\Statistics;
use App\Http\Controllers\user\PromotMyVideo;
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

Route::get( '/', function () {
    return redirect( 'login' );
} );

Route::middleware( ['auth:sanctum', 'verified'] )->get( '/dashboard', function () {
    return view( 'dashboard' );
} )->name( 'dashboard' );

// Admin
// Create User id
Route::get( "create_u_id", [Create_u_id::class, "index"] )->name( "create_u_id" );
Route::post( "create_u_id", [Create_u_id::class, "store"] )->name( "create_id" );
Route::delete( "delete_user/{id}", [Create_u_id::class, "delete"] );
Route::get( "search_user", [Create_u_id::class, "search"] )->name( "search_user" );
// Promot id
Route::get( "promot_id", [Promot_id::class, "index"] )->name( "promot_id" );
Route::post( "promot_id", [Promot_id::class, "store"] )->name( "promot_id" );
Route::post( "deny", [Promot_id::class, "deny"] )->name( "deny" );
Route::post( "alldeny", [Promot_id::class, "alldeny"] )->name( "allDeny" );
//Statistics
Route::get( 'statistics', [Statistics::class, 'index'] )->name( 'statistics' );
//User
Route::resource( 'user', PromotMyVideo::class );
Route::get( 'today_promote', [PromotMyVideo::class, 'today_promot'] )->name( 'today_promote' );
Route::get( 'watch_promote_video', [PromotMyVideo::class, 'watch_promot'] )->name( 'watch_promote' );
