<?php

namespace App\Http\Controllers;
use App\Models\User;
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
    public function index(Request $request)
    {
        $category = $request->input('category') ?? Quiz::inRandomOrder()->value('category');
        $amount = $request->input('amount') ?? rand(1, 50);
        $quizzes = Quiz::where('category', $category)->inRandomOrder()->limit($amount)->get();
        $quizzes->map(function ($quiz) {
            $quiz->incorrect_answers = json_decode($quiz->incorrect_answers);
            return $quiz;
        });
        return response()->json($quizzes);
    }

    public function highscore(Request $request){
        $user = User::findOrFail($request->user_id); 
        if ($user !== null && $request->highscore !== null) {
            $user->highscore += $request->highscore;
            $user->save();
        }
    }

public function returnHighscore(){
    $users = User::orderBy('highscore', 'desc')->take(10)->get();
    return response()->json($users);
}


    public function amount(){
        $amount = Quiz::count();
        return response($amount);
    }
    public function all(Request $request){
        $category = $request->input('category') ?? null;
        $quizzes = $category ? Quiz::where('category', $category)->get() : Quiz::all();
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
        $quiz->incorrect_answers = json_encode($request->incorrect_answers);
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();
    }

    /**
     * Update the specified quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
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
        $quiz->incorrect_answers = json_encode($request->incorrect_answers);
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();

    }

    /**
     * Remove the specified quiz from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $quiz = Quiz::findorfail($id);
        $quiz->delete();
        return response(200);
    }

    public function categories()
    {
        return response()->json(
            [
                ['value' => "15", 'name' => "Video Games"],
                ['value' => "21", 'name' => "Sports"],
                ['value' => "22", 'name' => "Geography"],
                ['value' => "23", 'name' => "History"],
            ]
        );
    }

}