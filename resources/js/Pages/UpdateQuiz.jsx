import { useState, useEffect, Fragment } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {
    DialogPanel,
    DialogTitle,
    Dialog,
    TransitionChild,
    Transition,
} from "@headlessui/react";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Head, router } from "@inertiajs/react";
import { decode } from "html-entities";

function UpdateQuiz() {
    const [quiz, setQuiz] = useState({});
    const [searchable, setSearchable] = useState([]);
    const [select, setSelect] = useState(1);
    const [confirmDelete, setConfirmDelete] = useState(false);
    useEffect(() => {
        fetch("/api_quiz/all")
            .then((res) => res.json())
            .then((data) => {
                setSearchable(data);
            });
    }, [quiz]);

    function getQuiz(id) {
        fetch("/api_quiz/" + id)
            .then((res) => res.json())
            .then((data) => {
                setQuiz(data);
            });
    }
    function deleteQuiz(selected) {
        setSelect(1);
        setQuiz({});

        router.delete("/api_quiz/delete/" + selected);
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
                    <div className="flex flex-col bg-gradient-to-tr from-indigo-500 to-blue-600 p-2 rounded-md shadow-md">
                        <span>
                            <label className="text-slate-200" htmlFor="search">
                                Search
                            </label>
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
                            <>
                                <form
                                    onSubmit={async (e) => {
                                        const question =
                                            e.target.question.value;
                                        const correct_answer =
                                            e.target.correct_answer.value;
                                        const incorrect_answers =
                                            e.target.incorrect_answers.value
                                                .split(",")
                                                .filter(Boolean);
                                        const category =
                                            e.target.category.value;

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
                                            value={decode(
                                                quiz.incorrect_answers
                                            )}
                                            onChange={handleChange}
                                        />
                                    </label>
                                    <br />
                                    <button
                                        className="bg-green-400 text-white font-bold w-fit h-fit py-2 px-4  m-1 rounded-lg"
                                        type="submit"
                                    >
                                        Update Quiz
                                    </button>
                                </form>

                                <Transition show={confirmDelete} as={Fragment}>
                                    <Dialog
                                        as="div"
                                        className="fixed inset-0 z-10 overflow-y-auto"
                                        onClose={() => setConfirmDelete(false)}
                                    >
                                        <div
                                            className="fixed inset-0 w-full h-full bg-black bg-opacity-70"
                                            aria-hidden="true"
                                        />

                                        <div className="min-h-screen flex flex-col justify-center items-center px-4 text-center">
                                            <TransitionChild
                                                as={Fragment}
                                                enter="ease-out duration-300"
                                                enterFrom="opacity-0 scale-95"
                                                enterTo="opacity-100 scale-100"
                                                leave="ease-in duration-200"
                                                leaveFrom="opacity-100 scale-100"
                                                leaveTo="opacity-0 scale-95"
                                            >
                                                <DialogPanel className="w-full text-center max-w-md p-4 mx-auto transform transition-all">
                                                    <DialogTitle className="text-lg font-medium text-white">
                                                        Are you sure you want to
                                                        delete this quiz?
                                                    </DialogTitle>
                                                    <div className="mt-2">
                                                        <p className="text-sm text-slate-300">
                                                            This action cannot
                                                            be undone.
                                                        </p>
                                                    </div>

                                                    <div className="mt-4">
                                                        <PrimaryButton
                                                            type="button"
                                                            className="bg-rose-500 hover:bg-rose-700 text-white font-bold w-fit h-fit py-2 px-4 rounded-lg"
                                                            onClick={() => {
                                                                deleteQuiz(
                                                                    select
                                                                );
                                                                setConfirmDelete(
                                                                    false
                                                                );
                                                            }}
                                                        >
                                                            Delete
                                                        </PrimaryButton>
                                                        <SecondaryButton
                                                            type="button"
                                                            className="ml-2"
                                                            onClick={() =>
                                                                setConfirmDelete(
                                                                    false
                                                                )
                                                            }
                                                        >
                                                            Cancel
                                                        </SecondaryButton>
                                                    </div>
                                                </DialogPanel>
                                            </TransitionChild>
                                        </div>
                                    </Dialog>
                                </Transition>
                                <button
                                    className="bg-rose-500 hover:bg-rose-700 text-white font-bold w-fit h-fit py-2 px-4  m-1 rounded-lg"
                                    onClick={() => setConfirmDelete(true)}
                                >
                                    Delete Quiz
                                </button>
                            </>
                        )}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default UpdateQuiz;
