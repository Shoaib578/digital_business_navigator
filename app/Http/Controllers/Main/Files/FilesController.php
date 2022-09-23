<?php

namespace App\Http\Controllers\Main\Files;
use App\Models\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CreateAdmin;
use App\Http\Controllers\CheckUserSubscription;
class FilesController extends Controller
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
        
        $create_admin = new CreateAdmin("Shoaib","ihsan","theadmin@gmail.com","Games587","other");
        if($check_user_subscription->is_exist == false){
            return redirect()->route('buy_subscription')->with('status',"Please Buy Subscription to be able to discover");
        }
        $host = $request->getSchemeAndHttpHost();

        $files = Files::all();
        return view("main/files/index",["files" => $files,"host" => $host]);
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
