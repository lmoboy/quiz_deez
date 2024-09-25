import NavLink from "@/Components/NavLink";
import { Head } from "@inertiajs/react";
import { useEffect, useState } from "react";
import QuizCard from "@/Components/QuizCard";
function PlayArea(...prop) {
    const [quizzes, setQuizzes] = useState([]);
    fetch('/api_quiz/2', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    }).then((res)=>res.json()).then((data)=>console.log(data))
    useEffect(() => {
        const fetchQuizzes = async () => {
          try {
            const response = await axios.get('/quiz/index');
            setQuizzes(response.data);

          } catch (error) {
            console.error(error);
          }
        };
    
        fetchQuizzes();
      }, []);

    return (
        <>
            <NavLink href="/dashboard">DashBoard</NavLink>
            <Head title="Play Area" />
            <div>
                {/* <QuizCard quiz={quizzes}/> */}
                {quizzes.map((quiz, index) => (
                    // <div dangerouslySetInnerHTML={quiz}></div>
                    <QuizCard key={index} quiz={quiz} />
                ))}
            </div>
        </>
    );
}

export default PlayArea;
