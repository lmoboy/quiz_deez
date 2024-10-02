import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DeleteUserForm from "./Partials/DeleteUserForm";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm";
import { Head } from "@inertiajs/react";

export default function Edit({ mustVerifyEmail, status }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">
                    Profile
                </h2>
            }
        >
            <Head title="Profile" />

            <div className="py-12 bg-gradient-to-l from-blue-900 to-indigo-800">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4  sm:p-8 bg-gradient-to-tr from-indigo-500 to-blue-600 shadow sm:rounded-lg">
                        <UpdateProfileInformationForm
                            mustVerifyEmail={mustVerifyEmail}
                            status={status}
                            className="max-w-xl "
                        />
                    </div>

                    <div className="p-4 sm:p-8 bg-gradient-to-tr from-indigo-500 to-blue-600 shadow sm:rounded-lg">
                        <UpdatePasswordForm className="max-w-xl " />
                    </div>

                    <div className="p-4 sm:p-8 bg-gradient-to-tr from-indigo-500 to-blue-600 shadow sm:rounded-lg">
                        <DeleteUserForm className="max-w-xl" />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
