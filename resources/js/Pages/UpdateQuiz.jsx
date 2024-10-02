import { useState, useEffect } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import { decode } from "html-entities";

function UpdateQuiz() {
    const [quiz, setQuiz] = useState({});
    const [searchable, setSearchable] = useState([]);
    const [select, setSelect] = useState(1);

    useEffect(() => {
        fetch("/api_quiz/all")
            .then((res) => res.json())
            .then((data) => {
                setSearchable(data);
            });
    }, []);

    function getQuiz(id) {
        fetch("/api_quiz/" + id)
            .then((res) => res.json())
            .then((data) => {
                setQuiz(data);
            });
    }

    function handleSearch(e) {
        const selected = e.target.value.toLowerCase();
        const filtered = searchable.filter(
            (quiz) =>
                quiz.question.toLowerCase().includes(selected) ||
                quiz.category.toLowerCase().includes(selected)
        );
        try {
            setSelect(filtered[0].id);
        } catch (e) {
            // setSelect(null);
        }
    }

    const handleChange = (e) => {
        setQuiz({ ...quiz, [e.target.name]: e.target.value });
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">
                    Update Quiz
                </h2>
            }
        >
            <Head title="Update Quiz" />
            <div className="flex items-center justify-center  w-full h-screen">
                <div className="bg-gradient-to-r  from-blue-900 to-indigo-800 h-full w-full justify-center items-center flex flex-col">
                    <div className="flex flex-col bg-gradient-to-l  from-blue-900 to-indigo-800 p-2 rounded-md shadow-md">
                        <span>
                            <label className="text-slate-200"  htmlFor="search" >Search</label>
                            <input
                                type="text"
                                className="bg-slate-300 m-1 w-min p-2 rounded-lg"
                                onChange={handleSearch}
                            />
                            
                            <select
                                name="quiz_select"
                                id="quiz_select"
                                value={select}
                                className="bg-slate-300 max-w-60 p-2 m-1  rounded-lg"
                                onChange={(e) => setSelect(e.target.value)}
                            >
                                {searchable.map((quiz) => (
                                    <option key={quiz.id} value={quiz.id}>
                                        {decode(quiz.question)}
                                    </option>
                                ))}
                            </select>

                            <button
                                className="bg-slate-300 px-2 py-1 m-1  rounded-lg"
                                onClick={() => getQuiz(select)}
                            >
                                Edit
                            </button>
                        </span>
                        {quiz.id && (
                            <form
                            onSubmit={async (e) => {
                                const question = e.target.question.value;
                                const correct_answer =
                                    e.target.correct_answer.value;
                                const incorrect_answers =
                                    e.target.incorrect_answers.value
                                        .split(",")
                                        .filter(Boolean);
                                const category = e.target.category.value;

                                e.preventDefault();

                                router.put("/api_quiz/edit/" + select, {
                                    owner_id: 1,
                                    id: select,
                                    question,
                                    correct_answer,
                                    incorrect_answers,
                                    category,
                                });
                            }}
                        >
                            <label className="text-slate-200">
                                question
                                <input
                                    type="text"
                                    name="question"
                                    className="bg-slate-300 m-1 text-slate-800 w-min p-2 rounded-lg"
                                    value={decode(quiz.question)}
                                    onChange={handleChange}
                                />
                            </label>
                            <br />
                            <label className="text-slate-200">
                                category
                                <input
                                    type="text"
                                    className="bg-slate-300 w-min  text-slate-800 p-2 m-1 rounded-lg"
                                    name="category"
                                    value={decode(quiz.category)}
                                    onChange={handleChange}
                                />
                            </label>
                            <br />
                            <label className="text-slate-200">
                                Correct answer:
                                <input
                                    type="text"
                                    className="bg-slate-300 w-min  text-slate-800 p-2 m-1 rounded-lg"
                                    name="correct_answer"
                                    value={decode(quiz.correct_answer)}
                                    onChange={handleChange}
                                />
                            </label>
                            <br />
                            <label className="text-slate-200">
                                Incorrect answers (comma separated):
                                <input
                                    type="text"
                                    className="bg-slate-300 w-min  text-slate-800 p-2 m-1 rounded-lg"
                                    name="incorrect_answers"
                                    value={decode(quiz.incorrect_answers)}
                                    onChange={handleChange}
                                />
                            </label>
                            <br />
                            <button
                                className="bg-slate-300 px-2 py-1 m-1 rounded-lg"
                                type="submit"
                            >
                                Update Quiz
                            </button>
                        </form>
                        )}
                        
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default UpdateQuiz;
