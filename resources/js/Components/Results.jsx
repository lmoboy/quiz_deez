/**
 * @function
 * @param {Object} props The props for the Results component
 * @param {number} props.correct The number of correct answers
 * @param {Object[]} props.questions The questions that were asked
 * @returns {JSX.Element} The Results component
 * @example
 * <Results
 *   correct={5}
 *   questions={[
 *     { question: 'What is the capital of France?', correct: true },
 *     { question: 'What is the capital of China?', correct: false },
 *     { question: 'What is the capital of USA?', correct: true },
 *     { question: 'What is the capital of Japan?', correct: false },
 *     { question: 'What is the capital of Brazil?', correct: true },
 *   ]}
 * />
 */
import { decode } from "html-entities";
export default function Results({ questions, correct }) {
    const correctAnswers = questions.filter(
        (question, index) => question.correct_answer === correct[index]
    );

    return (
        <div className="text-center border-2 p-2 rounded-xl border-black">
            <h2 className="text-3xl font-bold">
                You scored {correctAnswers.length} out of {questions.length}
            </h2>

            <ul>
                {questions.map((question, index) => (
                    <li
                        key={index}
                        className={`${
                            correct[index] === question.correct_answer
                                ? "text-green-500"
                                : "text-red-500"
                        }`}
                    >
                        {decode(question.question)}
                    </li>
                ))}
            </ul>

            <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit score
            </button>
            <button
                className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onClick={() => window.location.reload()}
            >
                Play Again
            </button>
        </div>
    );
}

Results.propTypes = {
    questions: [],
    correct: [],
};
