"use client";

import Form from "@/Components/Form";
// import Results from "@/Components/Results";
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
 *
 * It leverages the `Form` component to collect user inputs for the quiz parameters (number of
 * questions, category, difficulty, and type) and the `QuizCard` component to display individual
 * quiz questions. The quiz data is fetched from the Open Trivia Database API based on the user's
 * selections. The component also handles potential errors during the fetching process, including
 * rate limiting by the API.
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

    /**
     * Submits the form to the trivia API and fetches questions based on
     * the form data. If the response is successful, it sets the questions
     * state to the response data. If the response is a 429 (too many
     * requests), it throws a "Rate limited" error. Otherwise, it throws
     * an error with the response status text.
     *
     * @param {Object} formData - Form data containing the number of
     * questions to fetch, the category, the difficulty and the type
     */
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
                        (direction ? " visible " : " hidden ") + " quiz "
                    }
                />
            );
        });
    } else if (!loading && finished) {
        content = <Results correct={correct} questions={questions}></Results>;
    } else {
        content = <Form onSubmit={handleFormSubmit} />;
    }

    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Quiz
                </h2>
            }
        >
            <Head title="Quiz" />
            <div className="flex items-center justify-center w-full h-screen">
                <div
                    id="quiz_container"
                    className="bg-white h-full w-full justify-center items-center flex "
                >
                    {content}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
