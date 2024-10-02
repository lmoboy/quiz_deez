import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";

export function AddQuiz() {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">
                    Add Quiz
                </h2>
            }
        >
            <Head title="Add quiz" />
            <div className="flex items-center justify-center  w-full h-screen">
                <div className="bg-gradient-to-r  from-blue-900 to-indigo-800 h-full w-full justify-center items-center flex flex-col">
                    <div className="flex flex-col bg-gradient-to-l  from-blue-900 to-indigo-800 p-2 rounded-md shadow-md">
                        <span>
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
                                    router.post("/api_quiz", {
                                        question,
                                        correct_answer,
                                        incorrect_answers,
                                        category,
                                        owner_id: 1,
                                    });
                                }}
                            >
                                <label className="text-slate-200">
                                    question
                                    <input
                                        type="text"
                                        className="bg-slate-300 text-slate-800 m-1 w-min p-2 rounded-lg"
                                        name="question"
                                    />
                                </label>
                                <br />
                                <label className="text-slate-200">
                                    category
                                    <input
                                        type="text"
                                        className="bg-slate-300 text-slate-800  m-1 w-min p-2 rounded-lg"
                                        name="category"
                                    />
                                </label>
                                <br />
                                <label className="text-slate-200">
                                    Correct answer:
                                    <input
                                        type="text"
                                        className="bg-slate-300  text-slate-800 m-1 w-min p-2 rounded-lg"
                                        name="correct_answer"
                                    />
                                </label>
                                <br />
                                <label className="text-slate-200">
                                    Incorrect answers (comma separated):
                                    <input
                                        type="text"
                                        className="bg-slate-300 text-slate-800  m-1 w-min p-2 rounded-lg"
                                        name="incorrect_answers"
                                    />
                                </label>
                                <br />
                                <button
                                    className="bg-slate-300 px-2 py-1 m-1 rounded-lg"
                                    type="submit"
                                >
                                    Create Quiz
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default AddQuiz;
