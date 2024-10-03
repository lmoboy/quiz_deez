import { useEffect, useState } from "react";


function Highscore({ className }) {
    const [users, setUsers] = useState([]);
    useEffect(() => {
        fetch("/api_quiz/highscore").then((res) => res.json()).then((data) => {

            console.log(data[0])
            setUsers(data)});
    },[className])




    return (
        <div
            className={
                "text-slate-300 p-2 shadow-lg bg-gradient-to-l from-slate-900 to-slate-800 w-fit h-fit rounded-md " +
                className
            }
        >
            {users.map((user) => (
                <div key={user.name}>
                    {user.name} - {user.highscore}
                </div>
            ))}
        </div>
    );
}

export default Highscore;
