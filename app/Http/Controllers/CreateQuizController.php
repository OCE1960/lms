<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['home']]);
    }

    public function home()
    {
        $scores = DB::table('quizanswer')
                        ->select(DB::raw('distinct test_id, count(question) AS total,sum(ans) AS score, subject, quiz_name'))
                        ->groupBy('test_id','subject','quiz_name')
                        ->orderBy('quiz_name', 'asc')
                        ->get();
        return view('welcome')->with('scores',$scores);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = question :: all();
        if(count($questions) > 0 ){
            return view('quiz') -> with('questions', $questions);
        }
        return view('quiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createquiz');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'subject' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required',
        ]);

        $question = new question;
        $question -> subject = $request -> subject;
        $question -> question = $request -> question;
        $question -> option1 = $request -> option1;
        $question -> option2 = $request -> option2;
        $question -> option3 = $request -> option3;
        $question -> option4 = $request -> option4;
        $question -> answer = $request -> answer;
        $success = $question -> save();
        if($success){
            return redirect()->action('CreateQuizController@index');
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request)
    {
        $x = 1 ;
        $test_id = time();
       while($x <= 15){

        if( $request-> $x  == $request -> correct_answer[$x] ){
            $ans = 1;
        }else{
            $ans = 0;
        }

        $insert = DB::table('quizanswer')->insert([
            'subject' => $request -> subject[$x], 
            'question' => $request -> question[$x],
            'option' => $request-> $x ,
            'correct_answer' => $request -> correct_answer[$x],
            'quiz_name' => Auth::user()-> name ,
            'email' => Auth::user()-> email,
            'test_id' => $test_id,
            'ans' => $ans,
            ]);

            $x++;

       }


       return redirect()->action('CreateQuizController@home');
        
    }

}
