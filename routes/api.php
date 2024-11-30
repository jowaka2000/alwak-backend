<?php

use App\Http\Controllers\Api\Authscontroller;
use App\Http\Controllers\Api\RequestServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::post('/testing',function(Request $request){

//     if($request->hasFile('image')){
//         $image = $request->file('image');

//         $name = $image->hashName();

//         $image->move(getcwd().'/images',$name);
//         return response('uploaded',200);
//     }
//     return response('has not',399);

// });


Route::controller(Authscontroller::class)->group(function(){
    Route::post('/sawastaff/sign-in','register');
    Route::post('/alwak/login','login');
});


Route::controller(RequestServicesController::class)->group(function(){
    Route::post('alwak/request-service/create','create');
});