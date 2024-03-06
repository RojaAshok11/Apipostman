<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apicontroller;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register',[Apicontroller::class,'register']);
Route::post('/login',[Apicontroller::class,'login']);
Route::get('/detail',[Apicontroller::class,'detail'])
->middleware('auth:sanctum');
Route::post('/register',[Apicontroller::class,'register']);

// Route::get('/student',function(){
//  return 'i am a developer laravel';
// });

// Route::apiResource('/student',ApiController::class);{
//     return 'i am a developer laravel';
//    };

Route::post('/student','Apicontroller@create');
