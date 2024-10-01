import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-tr from-[#224861] to-[#0061a1]">
            <div>
                <Link href="/">
                    <ApplicationLogo className="w-40 h-auto " />
                </Link>
            </div>

            <div className="w-full  sm:max-w-md mt-6 px-6 py-4 text-white bg-gradient-to-r from-blue-500 to-indigo-500 shadow-md overflow-hidden sm:rounded-lg">
                {children}
            </div>
        </div>
    );
}
