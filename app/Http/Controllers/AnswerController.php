<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request, $slug)
    {
        $quiz = Quiz::where('slug',$slug)->firstOrFail();
        $name= $quiz->name;
        $this->validate($request, [
            'name' => 'required',
            'roll' => 'nullable',
            'email' => 'nullable|email',
        ]);
        $score=0;
        $right=0;
        $wrong=0;
        $answer = new Answer;
        $answer->name = $request -> name;
        $answer->quiz_id = $quiz -> id;
        $answer->roll = $request -> roll;
        $answer->email = $request -> email;
        foreach ($request->all() as $key => $value) {
            if(is_numeric($key)){
                 $option= Option::find($value);
                 if($option->is_correct){
                    $score+=1;
                    $right+=1;
                 }else {
                    $wrong+=1;
                 }
            }
        }
        $answer->score = $score;
        $answer->right = $right;
        $answer->wrong = $wrong;
        $answer->save();

        return view('quiz.result', compact(['name', 'score']));
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
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
