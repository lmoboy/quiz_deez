import Form from "@/Components/Form";
import QuizCard from "@/Components/QuizCard";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { useState } from "react";
import anime from "animejs";
import Results from "@/Components/Results";

/**
 * The Quiz component serves as the main container for the quiz application. It handles the
 * initiation of the quiz by displaying a form for user input, fetching quiz questions based on
 * the user's selections, and displaying either the questions or a loading state. The component
 * manages its own state for tracking the questions, loading status, and the dynamic rendering
 * of either the form for initiating the quiz or the quiz content itself.
 */
export default function Quiz() {
    const [questions, setQuestions] = useState([]);
    const [loading, setLoading] = useState(false);
    const [current, setCurrent] = useState(0);
    const [correct, setCorrect] = useState([]);
    const [finished, setFinished] = useState(false);

    const handleAnswer = (isCorrect) => {
        setCurrent(current + 1);
        setCorrect([...correct, isCorrect]);
        if (current + 1 === questions.length) {
            setFinished(true);
        }
    };

    
    const reset = () => {
        setQuestions([]);
        setLoading(false);
        setCurrent(0);
        setCorrect([]);
        setFinished(false);
    };


    const handleFormSubmit = (formData) => {
        setLoading(true);
        fetch(
            "https://opentdb.com/api.php?amount=" +
                formData.trivia_amount +
                "&category=" +
                formData.trivia_category +
                "&difficulty=" +
                formData.trivia_difficulty +
                "&type=" +
                formData.trivia_type
        )
            .then((response) => {
                if (response.status === 200) {
                    return response.json();
                } else if (response.status === 429) {
                    setLoading(false);
                    throw new Error("Rate limited");
                } else {
                    throw new Error(
                        `Failed to fetch quiz: ${response.statusText}`
                    );
                }
            })
            .then((data) => {
                setQuestions(data.results);
                setLoading(false);
            })
            .catch((error) => console.log(error));
    };

    const progress = Math.round(((current) / questions.length) * 100);

    let content;
    if (loading && !finished) {
        content = "loading";
    } else if (questions.length && !finished) {
        content = questions.map((element, key) => {
            let direction = key === current;
            anime({
                targets: ".quiz",
                duration: 250,
                opacity: [0, 1],
                translateX: [100, 0],
                easing: "easeInOutQuad",
            });
            return (
                <QuizCard
                    quiz={element}
                    key={key}
                    onAnswer={handleAnswer}
                    className={
                        (direction ? " visible " : " hidden ") + " quiz"
                    }
                />
            );
        });
    } else if (!loading && finished) {
        content = <Results correct={correct} questions={questions} playAgain={reset}></Results>;
    } else {
        content = <Form onSubmit={handleFormSubmit} />;
    }

    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">
                    Quiz
                </h2>
            }
        >
            <Head title="Quiz" />
            <div className="flex items-center justify-center  w-full h-screen">
                <div
                    id="quiz_container"
                    className="bg-gradient-to-r from-blue-900 to-indigo-800 h-full w-full justify-center items-center flex flex-col"
                >
                    <div className="w-full text-center text-slate-300 mb-4">
                        {questions.length > 0 && !finished && (
                            <p>
                                Question {current } of {questions.length}
                            </p>
                        )}
                    </div>
                    {content}
                </div>
            </div>
            {questions.length > 0 && !finished && (
                <div className="bg-gray-300 sticky bottom-0 h-4">
                    <div
                        style={{ width: `${progress}%` }}
                        className="bg-blue-500 h-full transition-all duration-300 ease-in-out"
                    ></div>
                </div>
            )}
        </AuthenticatedLayout>
    );
}
