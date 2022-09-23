<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPoints;
use App\Models\Levels;

class CheckLevel extends Controller
{
     function __construct(){
        $points= 0;

        $my_total_points = UserPoints::where("user_id",auth()->user()->id)->get();

        foreach($my_total_points as $my_points){
            $points = $points+$my_points->points;
        }
        User::where('id', '=' , auth()->user()->id)->update(array('points' => $points));
        $find_level = Levels::where("required_points","<=",$points)->first();
       

        if($find_level !=null){
            User::where('id', '=' , auth()->user()->id)->update(array('level' => $find_level->level));
        }

        
        
    }
}
