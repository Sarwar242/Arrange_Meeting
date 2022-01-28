<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function edit($id)
    {
        $question = Question::find($id);
        return view('quiz.q_edit', compact('question'));
    }
}
