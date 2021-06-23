<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Super_adminsController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\BusroutesController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\Bus_seatesController;
use App\Http\Controllers\Bus_schedulesController;
use App\Http\Controllers\Bus_schedule_bookingsController;
use App\Http\Controllers\API\SuperAdminAuthController;
use App\Http\Controllers\API\AuthController;



Route::post('User_register', [AuthController::class, 'User_register']);
Route::post('User_login', [AuthController::class, 'User_login']);


Route::middleware('auth:sanctum')->group(function () {

Route::post('User_logout', [AuthController::class, 'User_logout']);
    //----------------Bus_schedules------------------------

//Get API Code
Route::get('bus_schedules',[Bus_schedulesController::class, 'index']);

//Show ID API Code
Route::get('bus_schedules/{id}/show',[Bus_schedulesController::class, 'show']);

//insert API Code
Route::post('bus_schedules/add',[Bus_schedulesController::class, 'store']);

//Update API Code
Route::put('bus_schedules/{id}/update',[Bus_schedulesController::class, 'update']);

//Delete API Code
Route::delete('bus_schedules/{id}/delete',[Bus_schedulesController::class, 'destroy']);

//----------------Bus_schedule_bookings------------------------

//Get API Code
Route::get('bus_schedule_bookings',[Bus_schedule_bookingsController::class, 'index']);

//Show ID API Code
Route::get('bus_schedule_bookings/{id}/show',[Bus_schedule_bookingsController::class, 'show']);

//insert API Code
Route::post('bus_schedule_bookings/add',[Bus_schedule_bookingsController::class, 'store']);

//Update API Code
Route::put('bus_schedule_bookings/{id}/update',[Bus_schedule_bookingsController::class, 'update']);

//Delete API Code
Route::delete('bus_schedule_bookings/{id}/delete',[Bus_schedule_bookingsController::class, 'destroy']);

   
});


Route::post('Super_admin_register', [SuperAdminAuthController::class, 'Super_admin_register']);
Route::post('Super_admin_login', [SuperAdminAuthController::class, 'Super_admin_login']);


Route::middleware('auth:sanctum')->group(function () {

Route::post('Super_admin_logout', [SuperAdminAuthController::class, 'Super_admin_logout']);

//----------------Routes------------------------

//Get API Code
Route::get('routes',[RoutesController::class, 'index']);

//Show ID API Code
Route::get('routes/{id}/show',[RoutesController::class, 'show']);

//insert API Code
Route::post('routes/add',[RoutesController::class, 'store']);

//Update API Code
Route::put('routes/{id}/update',[RoutesController::class, 'update']);

//Delete API Code
Route::delete('routes/{id}/delete',[RoutesController::class, 'destroy']);

//----------------BusRoutes------------------------

//Get API Code
Route::get('bus_routes',[BusroutesController::class, 'index']);

//Show ID API Code
Route::get('bus_routes/{id}/show',[BusroutesController::class, 'show']);

//insert API Code
Route::post('bus_routes/add',[BusroutesController::class, 'store']);

//Update API Code
Route::put('bus_routes/{id}/update',[BusroutesController::class, 'update']);

//Delete API Code
Route::delete('bus_routes/{id}/delete',[BusroutesController::class, 'destroy']);

//----------------Bus------------------------

//Get API Code
Route::get('bus',[BusController::class, 'index']);

//Show ID API Code
Route::get('bus/{id}/show',[BusController::class, 'show']);

//insert API Code
Route::post('bus/add',[BusController::class, 'store']);

//Update API Code
Route::put('bus/{id}/update',[BusController::class, 'update']);

//Delete API Code
Route::delete('bus/{id}/delete',[BusController::class, 'destroy']);

//----------------Bus_seates------------------------

//Get API Code
Route::get('bus_seates',[Bus_seatesController::class, 'index']);

//Show ID API Code
Route::get('bus_seates/{id}/show',[Bus_seatesController::class, 'show']);

//insert API Code
Route::post('bus_seates/add',[Bus_seatesController::class, 'store']);

//Update API Code
Route::put('bus_seates/{id}/update',[Bus_seatesController::class, 'update']);

//Delete API Code
Route::delete('bus_seates/{id}/delete',[Bus_seatesController::class, 'destroy']);


});

