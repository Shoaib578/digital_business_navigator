<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\UserPoints;
use Illuminate\Support\Facades\DB;

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


Route::post('/get_points',function(){
    $points = request("points");
    $user_id = request("user_id");
    $service_id = request("service_id");
    $check_exist = DB::select("SELECT *,(SELECT count(*) FROM user_points WHERE service_id=$service_id AND user_id=$user_id) as exist FROM user_points WHERE service_id=$service_id AND user_id=$user_id");
   
    if($check_exist == null){
        UserPoints::create([
            "user_id" => $user_id,
            "points" => $points,
            "service_id"=>$service_id
        ]);
        return [
            "msg" => "added"
        ];
    }else{
        UserPoints::where('id', '=' , $check_exist[0]->id)->update(array(
            "points"=> $check_exist[0]->points+$points
        ));
        return [
            "msg"=>"updated"
        ];
    }
   
  
});