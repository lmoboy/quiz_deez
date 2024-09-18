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
export default function Results({ questions, correct }) {
    return (
        <div className="text-center">
            <h2 className="text-3xl font-bold">
                You scored {correct} out of {questions.length}
            </h2>
        </div>
    );
}

Results.propTypes = {
    questions: [],
    correct: 0,
}