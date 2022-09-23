<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CreateAdmin;
use App\Http\Controllers\CheckLevel;

use App\Http\Controllers\CheckUserSubscription;
use App\Models\Services;
use App\Models\UserPoints;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function check_service_score($service_id){
        $user_id = auth()->user()->id;
        $check = DB::select("SELECT *,(SELECT COUNT(*) FROM user_points WHERE user_points.service_id=$service_id AND user_points.user_id=$user_id) AS is_started_before FROM user_points WHERE user_points.user_id=$user_id AND service_id=$service_id");
       
        if($check[0]->points>0 && $check[0]->is_started_before>0 ){
           return DB::update("UPDATE user_points SET points=0 WHERE service_id=$service_id AND user_id=$user_id");
        }
    }

    public function index(Request $request)
    {
        if(auth()->user()->is_admin>0){
            return redirect()->route('admin_home');
        }
        
        $points = 0;

        $check_user_subscription = new CheckUserSubscription(auth()->user()->id);
        
        $create_admin = new CreateAdmin("Shoaib","ihsan","theadmin@gmail.com","Games587","other");
        $check_level = new CheckLevel();

        $user_points = UserPoints::where("user_id",auth()->user()->id)->get();

        foreach($user_points as $user_point){
            $points = $points+$user_point->points;
        }
        if($check_user_subscription->is_exist == false){
            return redirect()->route('buy_subscription')->with('status',"Please Buy Subscription to be able to discover");
        }
        
        if(auth()->user()->is_admin == 1){
            return redirect()->route('admin_home');
        }
        if(!auth()->user()){
            return redirect()->route('landing_page');
        }


        if(auth()->user() && auth()->user()->is_activated == 0){
            
            auth()->logout();
            return redirect()->route('auth')->with('status','This user deactivated by administrator');
               
        }

        $services = Services::all();
        $host = $request->getSchemeAndHttpHost();

       return view("main/home/index",["services"=>$services,"host"=>$host,"user_points"=>$points]);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if(auth()->user()->is_admin>0){
            return redirect()->route('admin_home');
        }
        $my_id = auth()->user()->id;
        $this->check_service_score($id);
        $service = Services::find($id);
        $host = $request->getSchemeAndHttpHost();
        $check_service = DB::select("SELECT *,(SELECT count(*) FROM user_bought_services WHERE user_bought_services.service_id=$id AND user_bought_services.user_id=$my_id) as is_bought FROM services WHERE id=$id");

        return view("main/view_service/index",["service" => $service,"host"=>$host,'is_bought'=>$check_service[0]->is_bought]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
