<?php

namespace App\Http\Controllers\Main\StartService;
use App\Models\UserBoughtServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\ServicesManagement;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Http;

class StartServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check_service_score($service_id){
        $user_id = auth()->user()->id;
        $check = DB::select("SELECT *,(SELECT COUNT(*) FROM user_points WHERE user_points.service_id=$service_id AND user_points.user_id=$user_id) AS is_started_before FROM services WHERE services.id=$service_id");

        if($check[0]->is_started_before>0){
            DB::update("UPDATE user_points SET points=0 WHERE service_id=$service_id AND user_id=$user_id");
        }
    }
    
    public function index(Request $request,$id,$page_number)
    {
        if(auth()->user()->is_admin>0){
            return redirect()->route('admin_home');
        }

        $this->check_service_score($id);
        $my_id = auth()->user()->id;
        $service = Services::find($id);

        $check_service = DB::select("SELECT *,(SELECT count(*) FROM user_bought_services WHERE user_bought_services.service_id=$id AND user_bought_services.user_id=$my_id) as is_bought FROM services WHERE id=$id");
        if(auth()->user()->level < $service->level_required){
            return redirect()->back()->with("status","Your Level is Lower than the required level!");
        }
        if($check_service[0]->is_bought == 0){
            return redirect()->back()->with("status","You will have to buy this service to be able to continue");
        }
        $host = $request->getSchemeAndHttpHost();
        $question_id=0;
        $points = 0;
        $questions = DB::select("SELECT *,(SELECT count(*) from services_management LEFT JOIN questions_managments on questions_managments.question_id=services_management.question_id LEFT JOIN questions on questions.question_id=services_management.question_id  WHERE services_management.service_id=$id) as questions_count FROM services_management LEFT JOIN questions_managments on questions_managments.question_id=services_management.question_id LEFT JOIN questions on questions.question_id=services_management.question_id  WHERE services_management.service_id=$id LIMIT 1  OFFSET $page_number");
        $questions_count_query = DB::select("SELECT *,(SELECT count(*) from services_management LEFT JOIN questions_managments on questions_managments.question_id=services_management.question_id LEFT JOIN questions on questions.question_id=services_management.question_id  WHERE services_management.service_id=$id) as questions_count FROM services_management LEFT JOIN questions_managments on questions_managments.question_id=services_management.question_id LEFT JOIN questions on questions.question_id=services_management.question_id  WHERE services_management.service_id=$id ");
        $questions_count = $questions_count_query[0]->questions_count;
        if($questions != null){
            $question_id = $questions[0]->question_id;

        }

        




        $answers = DB::select("SELECT * FROM answers WHERE answers.question_id=$question_id");
              
        $points_query = DB::select("SELECT * FROM user_points WHERE service_id=$service->id AND user_id=$my_id");
        if($points_query != null){
            $points = $points_query[0]->points;
        }
        return view("main/start_service/index",["host" => $host,"questions"=>$questions,"service"=>$service,"answers"=>$answers,"questions_count"=>$questions_count,"user_id"=>auth()->user()->id,"points"=>$points]);
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

    public function buy_service(Request $request,$id){
        if(auth()->user()->is_admin>0){
            return redirect()->route('admin_home');
        }
        UserBoughtServices::create([
            "user_id"=>auth()->user()->id,
            "service_id"=>$id
        ]);

        return redirect()->route('home')->with("status","Successfully Bought Service");
        
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
    public function show($id)
    {
        //
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
