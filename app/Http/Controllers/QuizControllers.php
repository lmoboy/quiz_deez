<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizControllers
{
    /**
     * Shows the main dashboard page with all quzzes
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        $quizzes->map(function ($quiz) {
            $quiz->incorrect_answers = json_decode($quiz->incorrect_answers);
            return $quiz;
        });
        return response()->json($quizzes);
    }

    /**
     * Show the specified quiz.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findorfail($id);
        $quiz->incorrect_answers = json_decode($quiz->incorrect_answers);
        return response()->json($quiz);
    }

    /**
     * Create a new quiz in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'owner_id' => 'required',
            'question' => 'required',
            'incorrect_answers' => 'required',
            'correct_answer' => 'required',
            'category' => 'required',
        ]);

        $quiz = new Quiz();
        $quiz->owner_id = $request->owner_id;
        $quiz->category = $request->category;
        $quiz->question = $request->question;
        $quiz->incorrect_answers = $request->incorrect_answers;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();
    }

    /**
     * Update the specified quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([

            'id' => 'required',
            'owner_id' => 'required',
            'question' => 'required',
            'incorrect_answers' => 'required',
            'correct_answer' => 'required',
            'category' => 'required',
        ]);

        $quiz = Quiz::findorfail($request->id);
        $quiz->question = $request->question;
        $quiz->category = $request->category;
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
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $quiz = Quiz::findorfail($request->id);

        $quiz->delete();
    }

}