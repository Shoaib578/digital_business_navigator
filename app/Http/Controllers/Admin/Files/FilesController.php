<?php

namespace App\Http\Controllers\Admin\Files;
use App\Models\Files;
use Illuminate\Support\Facades\File; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilesController extends Controller
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
        $files = Files::all();
        return view("admin/files/index",["host"=>$host,"files"=>$files]);
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
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        try{
            $file_name = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('/files'),$file_name);

            Files::create([
                "file_name" => $file_name,
                "title" => $request->title
            ]);
            return redirect()->back()->with("status","File has been added successfully");

        }catch(err){
            return redirect()->back()->with("status","Something went wrong");
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
        try{
            $file = Files::find($id);
            File::delete(public_path('files/'.$file->file_name));

            $file->delete();
        return redirect()->back()->with('status', 'Deleted successfully');
        }catch(err){
            return redirect()->back()->with('status', 'Something went wrong');

        }
    }
}
