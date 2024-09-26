import { Link } from "@inertiajs/react";

export default function NavLink({
    active = false,
    className = "",
    children,
    ...props
}) {
    return (
        <Link
            {...props}
            className={
                "relative inline-flex items-center px-3 py-2 border-b-0 text-sm font-medium leading-5 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none no-underline " +
                (active
                    ? "border-indigo-500 text-white bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg hover:shadow-2xl focus:ring-4 focus:ring-indigo-300 "
                    : "border-transparent text-gray-300 hover:text-indigo-400 hover:border-indigo-400 hover:bg-gray-800 focus:bg-gray-700 focus:text-indigo-300 ") +
                className
            }
        >
            {children}
            <span
                className={`absolute bottom-0 left-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 transition-all duration-500 ease-in-out ${
                    active ? "w-full" : "w-0 group-hover:w-full"
                }`}
            />
        </Link>
    );
}
