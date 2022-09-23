<?php

namespace App\Http\Controllers\Admin\Services;
use App\Models\Services;
use App\Models\ServicesManagement;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ServicesCrudController extends Controller
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
        $services = Services::all();


        return view("admin/services/index",["host" => $host, "services" => $services]);
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

        return view("admin/services/create_service",["host" => $host]);
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
        $title = $request->title;
        try{
            Services::create([
                "title"=>$title,
            "level_required"=>$request->level_required,
            "price"=>$request->price

            ]);
            return redirect()->back()->with("status","Created Successfully");

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
    public function show(Request $request,$id)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $host = $request->getSchemeAndHttpHost();
        $questions = DB::select("SELECT * FROM services_management LEFT JOIN questions_managments on questions_managments.question_id=services_management.question_id LEFT JOIN questions on questions.question_id=services_management.question_id WHERE services_management.service_id=$id");
        
        $service = Services::find($id);
        $all_questions = DB::select("SELECT * FROM questions");
        
        return view("admin/services/assign_question_to_service",["host" => $host,"service" => $service,"all_questions" => $all_questions,"questions" => $questions]);
    }


    public function assign_question_to_service(Request $request,$id){
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        ServicesManagement::create([
            "question_id" => $request->question_id,
            "service_id" => $id,
           
        ]);

        return redirect()->back()->with("status","Assigned Successfully");

    }

    public function view_question(Request $request,$id){
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $answers = DB::select("SELECT * FROM answers WHERE answers.question_id=$id");
        $host = $request->getSchemeAndHttpHost();
        
        return view('admin/services/view_question',["host"=>$host,"answers"=>$answers]);
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

    public function destroy_question($id)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $service = ServicesManagement::where("question_id", $id)->delete();
        
        return redirect()->back()->with("status","Deleted Successfully");
    }


    public function destroy($id)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $service = Services::find($id);
        $service->delete();
        return redirect()->back()->with("status","Deleted Successfully");
    }
}
