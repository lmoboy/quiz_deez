import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import Highscore from "@/Components/Highscore";


import { Head, router } from "@inertiajs/react";
import { useEffect, useState } from "react";

function PlayArea(...prop) {


    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-white leading-tight">Play Area</h2>
            }
        >
            <Head title="Update quiz" />
            <Highscore></Highscore>
        </AuthenticatedLayout>
    );
}

export default PlayArea;
