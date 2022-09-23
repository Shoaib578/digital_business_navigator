<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request){
      $host = $request->getSchemeAndHttpHost();

        return view('main/landing_page/index',["host" => $host]);
    }


    public function get_start(Request $request){
      $host = $request->getSchemeAndHttpHost();

      return redirect('/home',["host" => $host]);  
    }

    public function terms_and_conditions(Request $request){
      $host = $request->getSchemeAndHttpHost();

      return view("auth/terms_and_conditions",["host"=>$host]);
    }
}
