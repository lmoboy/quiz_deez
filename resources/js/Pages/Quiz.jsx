"use client";

import Form from "@/Components/Form";
import Results from "@/Components/Results";
import QuizCard from "@/Components/QuizCard";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { useState } from "react";
import anime from "animejs";
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
    const [correct, setCorrect] = useState(0);
    const [finished, setFinished] = useState(false);

    const handleAnswer = (isCorrect) => {
        setCurrent(current + 1);
        setCorrect(correct + isCorrect);
        console.log(current, correct, isCorrect);
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
    if (loading) {
        content = "loading";
    } else if (questions.length) {
        content = questions.map((element, key) => {
            // anime({
            //     targets: `.quiz`,
            //     opacity: [0, 1],
            //     duration: 1000,
            //     easing: "easeInOutSine",
            //     translateX: [1000, 0],
            // });
            return (
                <QuizCard
                    quiz={element}
                    id={key}
                    onAnswer={handleAnswer}
                    className={key === current ? "visible" : " hidden " + "quiz"}
                />
            );
        });
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
                    className="w-[499px] text-black  h-[548px] py-10 px-2 justify-center font-mono text-sm lg:flex bg-white border-slate-700 border-2 rounded-3xl"
                >
                    {content}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
