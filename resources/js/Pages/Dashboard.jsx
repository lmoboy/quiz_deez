import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard() {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />
            <div className="py-12 bg-gradient-to-r from-blue-900 to-indigo-800 h-screen">
                <div className="grid grid-cols-2 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-gradient-to-tr from-indigo-500 to-blue-600 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-slate-300">
                            <h2 className="text-3xl font-bold mb-4">
                                Welcome to DeezQuiz!
                            </h2>
                            <p className="mb-6">
                            DeezQuiz is the perfect place to compete with others
                                in quiz guessing!
                            </p>
                        </div>
                    </div>
                    <div className="bg-gradient-to-tr from-indigo-500 to-blue-600 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-slate-300">
                            <h2 className="text-3xl font-bold mb-4">
                                Explore Dee Quizzes!
                            </h2>
                            <p className="mb-6">
                                We have the largest collection of quizzes out
                                there, and we're always adding more.
                            </p>
                        </div>
                    </div>
                    <div className="bg-gradient-to-tr from-indigo-500 to-blue-600 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                        <div className="p-6 text-slate-300">
                            <h2 className="text-3xl font-bold mb-4">
                                Where to start?
                            </h2>
                            <p className="mb-6">
                                To get started, simply press the "Quiz" button
                                at the top of the page in the navigation bar.
                                You'll be taken to a page where you can select
                                from a variety of quizzes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
