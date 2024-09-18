"use client";

import Form from "@/Components/Form";
import QuizCard from "@/Components/QuizCard";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { useState } from "react";
export default function Quiz() {
    const [questions, setQuestions] = useState([]);
    const [loading, setLoading] = useState(false);

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
                formData.trivia_difficulty
        )
            .then((response) => {
                if (response.status === 200) {
                    return response.json();
                } else if (response.status === 429) {
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
        content = questions.map((element) => {
            return <QuizCard quiz={element} />;
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
