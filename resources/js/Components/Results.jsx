import { decode } from "html-entities";
import { useEffect } from "react";
import { usePage, router } from "@inertiajs/react"
/**
 * Component for displaying the results of a quiz.
 *
 * @param {{ questions: import('./QuizCard').Quiz[], correct: string[], playAgain: (boolean) => void }} props
 * @returns {JSX.Element}
 */
export default function Results({ questions, correct, playAgain }) {
    const user = usePage().props.auth.user
    // Подсчет количества правильных ответов
    const correctAnswersCount = questions.filter(
        (question, index) => question.correct_answer === correct[index]
    ).length;

    const handlePlayAgain = () => {
        playAgain(true);
    };

    useEffect(() => {
        router.post("/api_quiz/highscore", {
            highscore: correctAnswersCount,
            user_id: user.id, // Assuming you need to send user_id instead of user object
        });

    }, [correctAnswersCount]);

    return (
        <div className="flex justify-center items-center ">
            <div className="w-full max-w-3xl p-5  rounded-xl  bg-gradient-to-l from-blue-900 to-indigo-800 shadow-lg">
                <h2 className="text-3xl text-slate-300 font-bold text-center">
                    You scored {correctAnswersCount} of {questions.length}
                </h2>

                <div className="mt-4 text-slate-300 max-h-96 overflow-y-auto space-y-4">
                    <ul>
                        {questions.map((question, index) => (
                            <li key={index} className="text-left">
                                <p className="font-bold mb-2 text-lg">
                                    {decode(question.question)}
                                </p>

                                <p
                                    className={`p-2 rounded-lg ${
                                        question.correct_answer ===
                                        correct[index]
                                            ? "bg-green-100 text-green-600"
                                            : "bg-red-100 text-red-600"
                                    }`}
                                >
                                    Your answer: {decode(correct[index])}
                                </p>

                                {question.correct_answer !== correct[index] && (
                                    <p className="p-2 mt-1 rounded-lg bg-blue-100 text-blue-600">
                                        Correct answer:{" "}
                                        {decode(question.correct_answer)}
                                    </p>
                                )}
                            </li>
                        ))}
                    </ul>
                </div>

                <div className="mt-6 space-x-4 text-center">
                    <button
                        className="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        onClick={() => handlePlayAgain()}
                    >
                        Play Again
                    </button>
                </div>
            </div>
        </div>
    );
}
