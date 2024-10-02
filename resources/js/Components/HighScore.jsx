//vlada uzdevums
/*
1. Получи данные с сервера (когда кевин из комы выйдет перепишешь ока?)
2. Выведи топ 10 людей из тех самых данных (у тебя ниже пример)
3. Надо вывести имя и очки для каждого из 10 юзеров (ниже пример можешь туда добавить)
*/

import { useEffect, useState } from "react";
import { router } from "@inertiajs/react";
const piemers = [
    { username: "lolik", score: 50 },
    { username: "oranges", score: 10 },
    { username: "koks", score: 40 },
    { username: "bananas", score: 20 },
    { username: "toliks", score: 30 },
];

/*
Изолируй код, то есть пиши так что бы другие аспекты сайта не ломались.


*/

function Highscore({className}){
    const [users, setUsers] = useState([]);
    useEffect(() => {
        fetch("/api_quiz/highscore").then((res) => res.json()).then((data) => {

            console.log(data[0])
            setUsers(data)});
    },[])




    return(
            <div className={"text-slate-300 p-2 shadow-lg bg-gradient-to-l from-slate-900 to-slate-800 w-fit h-fit rounded-md " + className}>
                {users.map((user) => (
                    <div key={user.name}>
                        {user.name} - {user.highscore}
                    </div>
                ))}
            </div>
        
    )
}



export default Highscore;