<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CreateAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;

class AuthController extends Controller 
{
    

    
    public function index()
    {   
        $create_admin = new CreateAdmin("Shoaib","ihsan","theadmin@gmail.com","Games587","other");
        return view("auth/auth");
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
        $user = user::where('email','=',$request->email)->count();
        if($user>0){
        

        return redirect()->back()->with('status','User Already Exist');

        }
        User::create([
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "company_name"=>$request->company_name,
            "level"=>0,
            "is_activated"=>1,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "is_admin"=>0,
            "points"=>0

        ]);

        auth()->attempt($request->only('email','password'));
        return redirect()->route('home')->with('status','Logged In!');
    }


    public function login(Request $request)
    {

        
       
        

        

        if(!auth()->attempt($request->only('email','password'))){
        

            return back()->with('status','invalid login details');
        }

        if(auth()->user() && auth()->user()->is_activated == 0){
            
        auth()->logout();
        return redirect()->route('auth')->with('status','This user deactivated by administrator');
           
        }

        if(auth()->user()->is_admin == 1){
            return redirect()->route('admin_home');

        }else{
            return redirect()->route('home')->with('status','Logged In!');


        }


        
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

