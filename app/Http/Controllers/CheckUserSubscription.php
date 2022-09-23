<?php

namespace App\Http\Controllers;
use App\Models\UserSubscriptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckUserSubscription extends Controller
{
    var $check;
    var $is_exist;
    function __construct($user_id){
       $this->check = DB::select("SELECT *,(select count(*) from user_subscriptions where NOW() <= expire_date) as is_exist from user_subscriptions where user_id = $user_id");
       
       if($this->check && $this->check[0]->is_exist>0){
        $this->is_exist = true;
       }else{
        $this->is_exist = false;

       }

       return $this->is_exist;
    }
}
