<?php

use App\Http\Controllers\Api\Authscontroller;
use App\Http\Controllers\Api\GetJobsController;
use App\Http\Controllers\Api\RequestServicesController;
use App\Http\Controllers\Api\TownsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('alwak/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function () {
    Route::get('alwak/user', function (Request $request) {
        return $request->user();
    });

    Route::get('alwak/logout', [Authscontroller::class, 'logout']);

});
// Route::post('/testing',function(Request $request){

//     if($request->hasFile('image')){
//         $image = $request->file('image');

//         $name = $image->hashName();

//         $image->move(getcwd().'/images',$name);
//         return response('uploaded',200);
//     }
//     return response('has not',399);

// });


Route::controller(Authscontroller::class)->group(function () {
    Route::post('alwak/sign-in', 'register');
    Route::post('alwak/login', 'login');
});


Route::controller(RequestServicesController::class)->group(function () {
    Route::post('alwak/request-service/store', 'store');
    Route::post('alwak/service/update-service/update-service-user-id', 'updateServiceUserId');
});

Route::controller(GetJobsController::class)->group(function () {
    Route::post('alwak/job/request-job/store', 'store');
    Route::post('alwak/job/update-job/update-job-user-id', 'updateJobRequestId');
    Route::post('alwak/job/show-job/show-all-jobs-requested', 'show');
});


Route::controller(TownsController::class)->group(function(){
    Route::get('/alwak/search-location/towns/{search}','show');
});