import NavLink from "@/Components/NavLink";
import { Head } from "@inertiajs/react";
import { useEffect, useState } from "react";
import QuizCard from "@/Components/QuizCard";
function PlayArea(...prop) {
    const [quizzes, setQuizzes] = useState([]);

    useEffect(() => {
        const fetchQuizzes = async () => {
          try {
            const response = await axios.get('/quiz/index');
            setQuizzes(response.data);
            console.log(response.data[0])
            // response.data[0].forEach(element => {
            //     setQuizzes(prevQuizzes => [...prevQuizzes, ...element.question])
            // });
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
                {quizzes.map((quiz) => (
                    // <div dangerouslySetInnerHTML={quiz}></div>
                    <QuizCard key={quiz.id} quiz={quiz} />
                ))}
            </div>
        </>
    );
}

export default PlayArea;
