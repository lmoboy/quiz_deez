<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Quiz;

abstract class QuizControllers
{
    public function index() {
        return Inertia::render('Dashboard' , ['quzzes' => [Quiz::all() ?? []]]);
    }

    public function show($id) {
        return Inertia::render('Quiz/show' , ['quiz' => [Quiz::findorfail($id) ?? []]]);
    }

    public function create(Request $request) {
        $request->validate([
            'owner_id' => 'required',
            'qestion' => 'required',
            'answers' => 'required',
            'correct_answer' => 'required',
        ]);

        $quiz = new Quiz();
        $quiz->owner_id = $request->owner_id;
        $quiz->qestion = $request->qestion;
        $quiz->answers = $request->answers;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();
    }

    public function new() {
        return Inertia::render('Quiz/create');
    }

    public function edit() {
        return Inertia::render('Quiz/edit');
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
            'qestion' => 'required',
            'answers' => 'required',
            'correct_answer' => 'required',
        ]);

        $quiz = Quiz::findorfail($request->id);
        $quiz->qestion = $request->qestion;
        $quiz->answers = $request->answers;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();

    }

    public function destroy(Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
        ]);
        $quiz = Quiz::findorfail($request->id);
        if($quiz->owner_id !== $request->owner_id) {
            //TODO redirect to error page
        }
        $quiz->delete();
    }

}