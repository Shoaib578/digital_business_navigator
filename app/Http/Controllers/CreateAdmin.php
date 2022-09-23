<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class CreateAdmin extends Controller
{
    function __construct($first_name,$last_name,$email,$password,$company_name){
        $admin = User::where('is_admin','=',1)->count();
        if($admin>0){
            Log::info('This is some useful information.');
        }else{
            User::create([
                "first_name" =>$first_name,
                "last_name"=>$last_name,
                "email"=>$email,
                "company_name"=>$company_name,
                "password"=>Hash::make($password),
                "is_admin"=>1,
                "is_activated"=>1,
                "level"=>0,
                "points"=>0

            ]);
        }
        

    }
}
