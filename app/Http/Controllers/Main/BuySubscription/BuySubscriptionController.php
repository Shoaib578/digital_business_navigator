<?php

namespace App\Http\Controllers\Main\BuySubscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Models\UserSubscriptions;
use Carbon\Carbon;
use App\Http\Controllers\CheckUserSubscription;

class BuySubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->is_admin>0){
            return redirect()->route('admin_home');
        }
        $check_user_subscription = new CheckUserSubscription(auth()->user()->id);
        if($check_user_subscription->is_exist == true){
            return redirect()->route('home')->with("status","Successfully bought subscription");
        }
        $host = $request->getSchemeAndHttpHost();

        $subscriptions = Subscriptions::all();
        return view("main/buy_subscription/index",["subscriptions"=>$subscriptions,"host"=>$host]);
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
    public function store($subscription_id)
    {
        if(auth()->user()->is_admin>0){
            return redirect()->route('admin_home');
        }
        $subscription = Subscriptions::find($subscription_id);
        UserSubscriptions::create([
            "expire_date"=>Carbon::now()->addDays($subscription->duration),
            "subscription_id"=>$subscription->id,
            "user_id"=>auth()->user()->id
        ]);
        return redirect()->route('home')->with("status","Successfully bought subscription");

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
