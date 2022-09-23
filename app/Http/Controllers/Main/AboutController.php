<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request){
        $host = $request->getSchemeAndHttpHost();
        
        return view("main/about/index",["host" => $host,"host"=>$host]);
    }
}
