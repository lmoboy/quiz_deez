<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Quiz;

abstract class QuizControllers
{
    /**
     * Shows the main dashboard page with all quzzes
     *
     * @return \Inertia\Response
     */
    public function index() {
        return Inertia::render('Dashboard' , ['quizzes' => [Quiz::all() ?? []]]);
    }

    /**
     * Show the specified quiz.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id) {
        return Inertia::render('Quiz/show' , ['quiz' => [Quiz::findorfail($id) ?? []]]);
    }

    /**
     * Create a new quiz in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Show the form for creating a new quiz.
     *
     * @return \Inertia\Response
     */
    public function new() {
        return Inertia::render('Quiz/create');
    }
    /**
     * Show the form for editing a quiz.
     *
     * @return \Inertia\Response
     */
    public function edit() {
        return Inertia::render('Quiz/edit');

    }
    /**
     * Update the specified quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified quiz from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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