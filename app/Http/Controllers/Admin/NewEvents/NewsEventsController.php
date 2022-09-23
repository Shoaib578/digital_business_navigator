<?php

namespace App\Http\Controllers\Admin\NewEvents;
use App\Models\NewsEvents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class NewsEventsController extends Controller
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
        $news_events = NewsEvents::all();
        $host = $request->getSchemeAndHttpHost();

        return view('admin/news_events/index',["host" => $host, "news_events" => $news_events]);
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

        return view("admin/news_events/create_news_events",["host"=> $host]);
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
        $image_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/images'),$image_name);


        NewsEvents::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $image_name

        ]);
        return redirect()->back()->with("status","Added Successfully");
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
        $file = NewsEvents::find($id);
       
        File::delete(public_path('images/'.$file->image));
        $file->delete();
       
        return redirect()->back()->with("Status","Deleted Successfully");

    }
}
