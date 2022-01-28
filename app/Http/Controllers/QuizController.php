<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

use App\Models\Option;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Services\Quiz as SaveQuizOption;

class QuizController extends Controller
{

    public function index()
    {
        $quizs = Quiz::all();

        return view('quiz.index', ['quizs' => $quizs]);
    }

    public function quiz($slug)
    {
        $quiz = Quiz::where('slug',$slug)->firstOrFail();

        return view('quiz.exam', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }
    public function answers()
    {
        $answers=Answer::all();
        return view('quiz.answer', compact('answers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $slug = $this->makeSlug($request->name);
        $quiz = new Quiz;

        $quiz->name = $request->name;
        $quiz->slug = $slug;
        $quiz->save();

        return redirect()->route('admin.quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setup($id)
    {
        $quiz=Quiz::find($id);
        return view('quiz.view',compact('quiz'));
    }
    public function question(Request $request, $id)
    {
        $quiz=Quiz::find($id);
        $this->validate($request,[
            'question' => 'required|string',
            'correct' => 'required',
        ]);
        $question = new Question;
        $question->question=$request->question;
        $question->quiz_id=$id;
        $question->type="test";
        $question->save();

        $option = new Option;
        $option->option=$request ->option1;
        $option->question_id=$question->id;
        $option->is_correct=$request->correct=='option1'? 1:0;
        $option->save();
        $option = new Option;
        $option->option=$request ->option2;
        $option->question_id=$question->id;
        $option->is_correct=$request->correct=='option2'? 1:0;
        $option->save();
        if(!is_null($request ->option3)){
            $option = new Option;
            $option->option=$request ->option3;
            $option->question_id=$question->id;
            $option->is_correct=$request->correct=='option3'? 1:0;
            $option->save();
        }

        if(!is_null($request ->option4)){
            $option = new Option;
            $option->option=$request ->option4;
            $option->question_id=$question->id;
            $option->is_correct=$request->correct=='option4'? 1:0;
            $option->save();
        }


        if(!is_null($request ->option5)){
            $option = new Option;
            $option->option=$request ->option5;
            $option->question_id=$question->id;
            $option->is_correct=$request->correct=='option5'? 1:0;
            $option->save();
        }



        return redirect()->route('admin.quiz.setup',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function qEdit(Request $request, $id)
    {

        $type = $request->type;

        $question = Question::find($id);

        $questions = $this->question->with('options')
                                ->where('quiz_id', $quiz->id)->get();

        return view('backend.quiz.edit', [
                                        'quiz' => $quiz,
                                        'questions' => $questions,
                                        'type' => $type
                                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug, Request $request)
    {
        // DB::transaction(function() use ($slug, $request) {

            $this->validate($request, [
                    'question' => 'required',
                    'options.*' => 'required'
                ]);

            $type = $request->type;

            $quiz = $this->quiz->where('slug', $slug)->firstOrFail();

            //update question to db
            $question = new Question;
            $question->quiz_id  = $quiz->id;
            $question->question = $request->question;
            $question->type = $request->type;
            $question->is_active = 1;
            $question->save();

            $saveOption = (new SaveQuizOption)->saveOptions($request, $question, $type);

        // });

        return redirect()->route('quiz.edit', $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $quiz=Quiz::find($id);
        $quiz->delete();
        return redirect()->route('admin.quiz')->with('success', 'Quiz deleted successfully.');
    }

    public function qDelete($id)
    {
        $question=Question::find($id);
        $quiz_id=$question->quiz_id;
        $question->delete();
        return redirect()->route('admin.quiz.setup',$quiz_id)->with('success', 'Question deleted successfully.');
    }

    /** make slug from title */
    public function makeSlug($name)
    {

        $slug = Str::slug($name);

        $count = Quiz::where('slug', 'LIKE', '%'. $slug . '%')->count();

        $addCount = $count + 1;

        return $count ? "{$slug}-{$addCount}" : $slug;
    }
}
