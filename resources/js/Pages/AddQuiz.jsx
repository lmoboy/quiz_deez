import { useState } from "react";

export function AddQuiz() {

const [questions, setQuestions] = useState([]);



return (
    <>
        <NavLink href="/dashboard">DashBoard</NavLink>
        <Head title="Play Area" />
        <form
            onSubmit={async (e) => {
                const question = e.target.question.value;
                const correct_answer = e.target.correct_answer.value;
                const incorrect_answers = e.target.incorrect_answers.value
                    .split(",")
                    .filter(Boolean);
                const category = e.target.category.value;
                e.preventDefault();
                router.post("/api_quiz", {
                    question,
                    correct_answer,
                    incorrect_answers,
                    category,
                    owner_id: 1,
                });
            }}
        >
            <label>
                question
                <input type="text" name="question" />
            </label>
            <br />
            <label>
                category
                <input type="text" name="category" />
            </label>
            <br />
            <label>
                Correct answer:
                <input type="text" name="correct_answer" />
            </label>
            <br />
            <label>
                Incorrect answers (comma separated):
                <input type="text" name="incorrect_answers" />
            </label>
            <br />
            <button type="submit">Create Quiz</button>
        </form>
        <ul>
            {questions.map((question, index) => (
                <li key={index}>{question.question}</li>
            ))}
        </ul>
    </>
);

}