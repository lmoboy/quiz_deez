import NavLink from "@/Components/NavLink";
import { Head, router } from "@inertiajs/react";
import { useEffect, useState } from "react";
import QuizCard from "@/Components/QuizCard";
function PlayArea(...prop) {
    const [questions, setQuestions] = useState([]);

    // const [quizzes, setQuizzes] = useState([]);
    // fetch('/api_quiz/2', {
    //     method: 'GET',
    //     headers: {
    //         'Content-Type': 'application/json'
    //     },
    // }).then((res)=>res.json()).then((data)=>console.log(data))
    // useEffect(() => {
    //     const fetchQuizzes = async () => {
    //       try {
    //         const response = await axios.get('/quiz/index');
    //         setQuizzes(response.data);

    //       } catch (error) {
    //         console.error(error);
    //       }
    //     };

    //     fetchQuizzes();
    //   }, []);

    // return (
    //     <>
    //         <NavLink href="/dashboard">DashBoard</NavLink>
    //         <Head title="Play Area" />
    //         <div>
    //             {/* <QuizCard quiz={quizzes}/> */}
    //             {quizzes.map((quiz, index) => (
    //                 // <div dangerouslySetInnerHTML={quiz}></div>
    //                 <QuizCard key={index} quiz={quiz} />
    //             ))}
    //         </div>
    //     </>
    // );

    return (
        <>
            <NavLink href="/dashboard">DashBoard</NavLink>
            <form
                onSubmit={async (e) => {
                    const question = e.target.question.value;
                    const correct_answer = e.target.correct_answer.value;
                    const incorrect_answers = e.target.incorrect_answers.value
                        .split(",")
                        .filter(Boolean);

                    e.preventDefault();
                    router.post(
                        "/api_quiz",
                        {
                            question,
                            correct_answer,
                            incorrect_answers,
                            category: 'general',
                            owner_id: 1
                        }
                    );
                    // const question = e.target.question.value;
                    // const correct_answer = e.target.correct_answer.value;
                    // const incorrect_answers = e.target.incorrect_answers.value.split(',').filter(Boolean);
                    // const response = await fetch('/api_quiz', {
                    //   method: 'POST',
                    //   headers: {
                    //     'Content-Type': 'application/json'
                    //   },
                    //   body: JSON.stringify({ question, correct_answer, incorrect_answers })
                    // });
                    // if (response.ok) {
                    //   setQuestions([...questions, { question, correct_answer, incorrect_answers }]);
                    //   e.target.reset();
                    // } else {
                    //   console.error(await response.text());
                    // }
                }}
            >
                <label>
                    Question:
                    <input type="text" name="question" />
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

export default PlayArea;
