<?php

namespace App\Http\Controllers\Admin\Subscription;
use App\Models\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $host = $request->getSchemeAndHttpHost();
        $subscriptions = Subscriptions::all();
        return view('admin/subscription/index',["host" => $host,"subscriptions" => $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $host = $request->getSchemeAndHttpHost();
        return view('admin/subscription/create_subscription',["host" => $host]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $title= $request->title;
        $duration = $request->duration;
        $price = $request->price;

        try{
            Subscriptions::create([
                "title"=>$title,
                "duration"=>$duration,
                "price"=>$price,
            ]);
    
            return redirect()->route('admin_create_subscription')->with("status","Subscription created successfully");
        }catch(err){
            return redirect()->route('admin_create_subscription')->with("status","Something Went Wrong");

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

        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $subs=Subscriptions::find($id);
        $subs->delete();
        return redirect()->back()->with("status","Successfully deleted");
    }
}
