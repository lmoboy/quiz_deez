import { useState } from "react";
import { decode } from "html-entities";


export default function QuizCard({ quiz }) {
    console.log(quiz)
    const [template] = useState({
        question: quiz.question,
        answers: [...quiz.incorrect_answers, quiz.correct_answer].sort(() => 0.5 - Math.random()),
    });


    const handleClick = (answer) => {
        console.log('clik')
        if (answer === quiz.correct_answer) {
            console.log("YAPIII");
        }
    };
    return (
        <div className="bg-white p-6 rounded-lg shadow-md">
            <h2 className="text-2xl font-semibold">{decode(template.question)}</h2>
            <ul className="list-disc pl-4 mt-2">
                {template.answers.map((answer, i) => (
                    <button
                        key={answer}
                        onClick={()=>handleClick(answer)}
                        className="cursor-pointer border-2 border-black rounded-lg p-2 mt-2"
                    >
                        {decode(answer)}
                    </button>
                ))}
            </ul>
        </div>
    );
}

QuizCard.propTypes = {
    quiz: {},
  };
