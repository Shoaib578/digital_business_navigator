<?php

namespace App\Http\Controllers\Admin\Questions;
use App\Models\Questions;
use App\Models\Answers;
use App\Models\QuestionsManagment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsCrudController extends Controller
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
        $questions = Questions::all();
        return view("admin/questions/index",["host" => $host, "questions" => $questions]);
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

        return view("admin/questions/create_question",["host" => $host]);
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
        $question = $request->question;
        try{
            Questions::create([
                "question"=>$question
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
        $answers = DB::select("SELECT * FROM questions_managments LEFT JOIN answers on answers.id=answer_id LEFT JOIN questions on questions.question_id=questions_managments.question_id WHERE questions_managments.question_id=$id");
        $host = $request->getSchemeAndHttpHost();
        $question = Questions::where("question_id",$id)->first();;
        $all_answers = Answers::get();
        return view("admin/questions/assign_answers_to_question",["answers"=>$answers,"host"=>$host,"question"=>$question,"all_answers"=>$all_answers]);
    }


    public function AssignAnswer(Request $request,$question_id){
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        QuestionsManagment::create([
            "question_id"=>$question_id,
            "answer_id"=>$request->answer
        ]);
        return redirect()->back()->with("status","Assigned Successfully");
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

    public function delete_answer_from_question($answer_id)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $answer = QuestionsManagment::where("answer_id", $answer_id)->delete();
        
        return redirect()->back()->with("status","Deleted Successfully");
    }

    public function destroy($id)
    {
        if(auth()->user()->is_admin==0){
            return redirect()->route('home');
        }
        $question = Questions::where("question_id", $id)->delete();
       
        return redirect()->back()->with("status","Deleted Successfully");
    }
}
