<?php

namespace App\Http\Controllers\Admin\Answers;
use App\Models\Answers;
use App\Models\Questions;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswersCrudController extends Controller
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
        $answers = DB::select("SELECT * FROM answers LEFT JOIN questions on questions.question_id=answers.question_id");
        return view("admin/answers/index",["host" => $host, "answers" => $answers]);
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
        $questions = Questions::get();
       

        return view("admin/answers/create_answer",["host" => $host,"questions" => $questions]);
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
        $answer = $request->answer;
        $points = $request->points;

        try{
            Answers::create([
                "answer"=>$answer,
                "points"=>$points,
                "question_id"=>$request->question
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
    public function show($id)
    {
      
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
        $answer = Answers::find($id);
        $answer->delete();
        return redirect()->back()->with("status","Deleted Successfully");
    }
}
