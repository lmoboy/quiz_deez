import { useState } from "react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import NavLink from "@/Components/NavLink";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, usePage } from "@inertiajs/react";

export default function Authenticated({ header, children }) {
    const user = usePage().props.auth.user;
    const [showingNavigationDropdown, setShowingNavigationDropdown] =
        useState(false);

    return (
        <div className="min-h-screen bg-gradient-to-r bg-white ">
            <nav className="bg-gradient-to-r from-blue-900 to-indigo-800 border-b border-gray-700 shadow-lg">
                <div className="max-w-screen-xl mx-auto p-4 flex items-center justify-between">
                    <Link
                        href="/"
                        className="flex items-center space-x-3 rtl:space-x-reverse"
                    >
                        <ApplicationLogo className="h-8 w-auto fill-current text-white" />
                        <span className="self-center text-2xl font-semibold tracking-wider">
                            QZAR
                        </span>
                    </Link>
                    <div className="flex items-center space-x-4">
                        <div className="hidden md:flex space-x-8 rtl:space-x-reverse">
                            <NavLink
                                href={route("dashboard")}
                                active={route().current("dashboard")}
                            >
                                Dashboard
                            </NavLink>
                            <NavLink
                                href={route("quiz")}
                                active={route().current("quiz")}
                            >
                                Quiz
                            </NavLink>
                            <NavLink
                                href={route("test")}
                                active={route().current("test")}
                            >
                                Play Area
                            </NavLink>
                        </div>

                        <div className="hidden sm:flex sm:items-center">
                            <Dropdown>
                                <Dropdown.Trigger>
                                    <span className="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            className="inline-flex items-center px-3 py-2 bg-indigo-600 text-sm font-medium rounded-md text-white hover:bg-indigo-500 dark:bg-gray-800 dark:hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            {user.name}
                                            <svg
                                                className="ml-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clipRule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </Dropdown.Trigger>

                                <Dropdown.Content>
                                    <Dropdown.Link href={route("profile.edit")}>
                                        Profile
                                    </Dropdown.Link>
                                    <Dropdown.Link
                                        href={route("logout")}
                                        method="post"
                                        as="button"
                                    >
                                        Log Out
                                    </Dropdown.Link>
                                </Dropdown.Content>
                            </Dropdown>
                        </div>

                        <button
                            onClick={() =>
                                setShowingNavigationDropdown(
                                    !showingNavigationDropdown
                                )
                            }
                            className="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-200 rounded-lg md:hidden hover:bg-indigo-500 focus:outline-none transition duration-150 ease-in-out"
                        >
                            <svg
                                className="w-5 h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 17 14"
                            >
                                <path
                                    stroke="currentColor"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    d={
                                        showingNavigationDropdown
                                            ? "M6 18L18 6M6 6l12 12"
                                            : "M1 1h15M1 7h15M1 13h15"
                                    }
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <div
                    className={`md:hidden ${
                        showingNavigationDropdown ? "block" : "hidden"
                    }`}
                >
                    <ul className="font-medium flex flex-col p-4 space-y-3 border-t border-gray-700 bg-gray-900">
                        <ResponsiveNavLink
                            href={route("dashboard")}
                            active={route().current("dashboard")}
                        >
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route("quiz")}
                            active={route().current("quiz")}
                        >
                            Quiz
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route("test")}
                            active={route().current("test")}
                        >
                            Play Area
                        </ResponsiveNavLink>

                        <div className="pt-4 pb-1 border-t border-gray-700">
                            <div className="px-4">
                                <div className="font-medium text-base text-white">
                                    {user.name}
                                </div>
                                <div className="font-medium text-sm text-gray-400">
                                    {user.email}
                                </div>
                            </div>
                            <ResponsiveNavLink href={route("profile.edit")}>
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                method="post"
                                href={route("logout")}
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </ul>
                </div>
            </nav>

            {header && (
                <header className="bg-gradient-to-r from-gray-900 to-indigo-900 shadow dark:bg-gray-800">
                    <div className="max-w-screen-xl text-white mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1>{header}</h1>
                    </div>
                </header>
            )}

            <main>{children}</main>
        </div>
    );
}
