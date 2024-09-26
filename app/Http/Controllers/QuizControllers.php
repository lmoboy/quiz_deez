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

    public function categories()
    {
        return response()->json(
            [
                ['value' => "9", 'name' => "General Knowledge"],
                ['value' => "10", 'name' => "Entertainment: Books"],
                ['value' => "11", 'name' => "Entertainment: Film"],
                ['value' => "12", 'name' => "Entertainment: Music"],
                ['value' => "13", 'name' => "Entertainment: Musicals & Theatres"],
                ['value' => "14", 'name' => "Entertainment: Television"],
                ['value' => "15", 'name' => "Entertainment: Video Games"],
                ['value' => "16", 'name' => "Entertainment: Board Games"],
                ['value' => "17", 'name' => "Science & Nature"],
                ['value' => "18", 'name' => "Science: Computers"],
                ['value' => "19", 'name' => "Science: Mathematics"],
                ['value' => "20", 'name' => "Mythology"],
                ['value' => "21", 'name' => "Sports"],
                ['value' => "22", 'name' => "Geography"],
                ['value' => "23", 'name' => "History"],
                ['value' => "24", 'name' => "Politics"],
                ['value' => "25", 'name' => "Art"],
                ['value' => "26", 'name' => "Celebrities"],
                ['value' => "27", 'name' => "Animals"],
                ['value' => "28", 'name' => "Vehicles"],
                ['value' => "29", 'name' => "Entertainment: Comics"],
                ['value' => "30", 'name' => "Science: Gadgets"],
                ['value' => "31", 'name' => "Entertainment: Japanese Anime & Manga"],
                ['value' => "32", 'name' => "Entertainment: Cartoon & Animations"],
            ]
        );
    }

}