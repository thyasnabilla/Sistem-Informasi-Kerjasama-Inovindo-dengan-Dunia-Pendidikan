<?php

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regencie;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('provinces',function(){
    $provinces = Province::get();
    return response()->json($provinces);
});
Route::get('regencies/{id}',function($id){
    $regencies = Regencie::where('province_id',$id)->get();
    return response()->json($regencies);
});
Route::get('districts/{id}',function($id){
    $districts = District::where('regency_id',$id)->get();
    return response()->json($districts);
});
Route::get('villages/{id}',function($id){
    $villages = Village::where('district_id',$id)->get();
    return response()->json($villages);
});
