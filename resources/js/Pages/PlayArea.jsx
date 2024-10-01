import NavLink from "@/Components/NavLink";
import { Head, router } from "@inertiajs/react";
import { useEffect, useState } from "react";
function PlayArea(...prop) {
    let [quiz, setQuiz] = useState({
        id: 6,
        owner_id: 0,
        question: "",
        category: "",
        incorrect_answers: [],
    });
    // function handleUpdate(form){
    //     router.put(`/api_quiz/${form.id}`, form);
    // }

    useEffect(() => {
        fetch("/api_quiz/6")
            .then((res) => res.json())
            .then((data) => {
                setQuiz(data);
            });
    }, []);

    const handleChange = (e) => {
        setQuiz({ ...quiz, [e.target.name]: e.target.value });
    };

    return (
        <>
            <NavLink href="/dashboard">DashBoard</NavLink>
            <Head title="Play Area" />
            {quiz ? (
                <form
                    onSubmit={async (e) => {
                        const question = e.target.question.value;
                        const correct_answer = e.target.correct_answer.value;	
                        const incorrect_answers = e.target.incorrect_answers.value.split(",").filter(Boolean);
                        const category = e.target.category.value;
                        console.log(
                            question,
                            correct_answer,
                            incorrect_answers,
                            category
                        );
                        e.preventDefault();
                        router.put("/api_quiz/6", {
                            question,
                            correct_answer,
                            incorrect_answers,
                            category,
                        });
                    }}
                >
                    <label>
                        question
                        <input
                            type="text"
                            name="question"
                            value={quiz.question}
                            onChange={handleChange}
                        />
                    </label>
                    <br />
                    <label>
                        category
                        <input
                            type="text"
                            name="category"
                            value={quiz.category}
                            onChange={handleChange}
                        />
                    </label>
                    <br />
                    <label>
                        Correct answer:
                        <input
                            type="text"
                            name="correct_answer"
                            value={quiz.correct_answer}
                            onChange={handleChange}
                        />
                    </label>
                    <br />
                    <label>
                        Incorrect answers (comma separated):
                        <input
                            type="text"
                            name="incorrect_answers"
                            value={quiz.incorrect_answers}
                            onChange={handleChange}
                        />
                    </label>
                    <br />
                    <button type="submit">Create Quiz</button>
                </form>
            ) : null}
        </>
    );
}

export default PlayArea;
