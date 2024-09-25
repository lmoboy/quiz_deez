import { Link, Head } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    const handleImageError = () => {
        document
            .getElementById("screenshot-container")
            ?.classList.add("!hidden");
        document.getElementById("docs-card")?.classList.add("!row-span-1");
        document
            .getElementById("docs-card-content")
            ?.classList.add("!flex-row");
        document.getElementById("background")?.classList.add("!hidden");
    };

    return (
        <>
            <Head title="Welcome" />
            <div className="relative min-h-screen">
                {/* Background Image */}
                <div
                    className="absolute inset-0 bg-cover bg-center opacity-80"
                    style={{ backgroundImage: "url('/quiz.jpg')" }} // Use /quiz.jpg because it's in the public directory
                ></div>

                {/* Main Content */}
                <div className="relative z-10 flex flex-col justify-center items-center min-h-screen bg-gray-50 bg-opacity-50 dark:bg-black dark:bg-opacity-50">
                    <div className="text-center">
                        {/* Welcome Message */}
                        <h1 className="text-5xl font-bold text-black dark:text-indigo-300 mb-6">
    Welcome to <span className="underline underline-offset-2 decoration-indigo-400">DeezQUIZ</span>
</h1>

                        <p className="text-2xl font-bold text-black dark:text-indigo-200 mb-6">Test your knowledge in deez many categories!</p>


                        {/* Action Buttons */}
                        <div className="flex justify-center space-x-4">
                            {auth.user ? (
                                // If the user is authenticated, show a link to the dashboard
                                <Link
                                    href={route('dashboard')}
                                    className="px-6 py-3 text-white rounded-md shadow hover:shadow-lg transition bg-gradient-to-r from-indigo-600 to-indigo-800"
                                >
                                    Go to Dashboard
                                </Link>
                            ) : (
                                <>
                                    {/* Links for guests */}
                                    <Link
                                        href={route('login')}
                                        className="px-6 py-3 text-white rounded-md shadow hover:shadow-lg transition bg-gradient-to-r from-indigo-600 to-indigo-800"
                                    >
                                        Login
                                    </Link>

                                    <Link
                                        href={route('register')}
                                        className="px-6 py-3 text-white rounded-md shadow hover:shadow-lg transition bg-gradient-to-r from-indigo-600 to-indigo-800"
                                    >
                                        Register
                                    </Link>
                                </>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
