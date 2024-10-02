import { useState, useRef } from "react";
import { decode } from "html-entities";
import anime from "animejs";
/**
 * A single question and its possible answers
 * @param {object} quiz The question data, including the question itself and an array of possible answers
 * @param {function} onAnswer A function to call when the user answers, which takes a boolean indicating whether the answer was correct
 * @returns {JSX.Element} A div containing the question and its possible answers
 */
export default function QuizCard({ quiz, onAnswer, className }) {
    const quizCardRef = useRef(null);

    const [template] = useState({
        question: quiz.question,
        answers: [...quiz.incorrect_answers, quiz.correct_answer].sort(
            () => 0.5 - Math.random()
        ),
    });

    /**
     * Handles the user's answer to a question
     * @param {string} answer The user's answer
     * @returns {void}
     */
    const handleClick = (answer) => {
        const isCorrect = answer;
        anime({
            targets: quizCardRef.current,
            translateX: [0, -100], // slide out to the right
            opacity: [1, 0],
            easing: "easeOutExpo",
            duration: 250,
            complete: () => {
                onAnswer(isCorrect); // Call the onAnswer function with the boolean value
            },
        });
    };

    return (
        <div ref={quizCardRef} className={className + "  bg-gradient-to-r p-4 to-indigo-500 from-indigo-600 shadow-lg rounded-md"}>
            <h2 className="text-2xl text-slate-300 font-semibold">
                {decode(template.question)}
            </h2>
            <ul className="flex text-slate-300 flex-col w-full pl-4 mt-2">
                {template.answers.map((answer) => (
                    <button
                        key={answer}
                        onClick={() => handleClick(answer)}
                        className="cursor-pointer hover:scale-105 duration-75 border-2 border-white rounded-lg p-2 mt-2"
                    >
                        {decode(answer)}
                    </button>
                ))}
            </ul>
        </div>
    );
}

