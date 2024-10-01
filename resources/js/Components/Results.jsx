import { decode } from "html-entities";

/**
 * Component for displaying the results of a quiz.
 *
 * @param {{ questions: import('./QuizCard').Quiz[], correct: string[], playAgain: (boolean) => void }} props
 * @returns {JSX.Element}
 */
export default function Results({ questions, correct, playAgain }) {
    // Подсчет количества правильных ответов
    const correctAnswersCount = questions.filter(
        (question, index) => question.correct_answer === correct[index]
    ).length;

    const handlePlayAgain = () => {
        playAgain(true);
    };

    return (
        <div className="flex justify-center items-center ">
            {/* Основной контейнер */}
            <div className="w-full max-w-3xl p-5 border-2 rounded-xl  bg-gradient-to-l from-blue-900 to-indigo-800shadow-lg">
                {/* Показать количество правильных ответов */}
                <h2 className="text-3xl text-slate-300 font-bold text-center">
                    You scored {correctAnswersCount} of {questions.length}
                </h2>

                {/* Прокручиваемый контейнер с ограниченной высотой */}
                <div className="mt-4 text-slate-300 max-h-96 overflow-y-auto space-y-4">
                    <ul>
                        {questions.map((question, index) => (
                            <li key={index} className="text-left">
                                {/* Вопрос */}
                                <p className="font-bold mb-2 text-lg">
                                    {decode(question.question)}
                                </p>

                                {/* Ответ пользователя, окрашенный в зависимости от правильности */}
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

                                {/* Отображение правильного ответа, если ответ был неверным */}
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

                {/* Кнопки действий */}
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
