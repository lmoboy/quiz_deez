import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import { useEffect, useState } from "react";

function PlayArea(...prop) {
    let ok = 1;
    console.log("pre-effect")
    useEffect(() => {
        console.log("effect")
    },[ok])
    console.log("post-effect")

    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">Play Area</h2>
            }
        >
            <Head title="Update quiz" />

        </AuthenticatedLayout>
    );
}

export default PlayArea;
