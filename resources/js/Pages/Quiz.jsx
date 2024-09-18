"use client";

import { useState } from "react";
import { decode } from "html-entities";
import anime from "animejs";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Quiz() {
  const container = document.getElementById("quiz_container");
  const [start, setStart] = useState(false);

  const [quiz, setQuiz] = useState({});
  const [score, setScore] = useState(0);
  const [correctAnswer, setCorrectAnswer] = useState("");
  const [questions, setQuestions] = useState({});
  const [showQuestion, setShowQuestion] = useState(false);

  const loadQuiz = async () => {
    setShowQuestion(false);
    setStart(true);
    fetch("https://opentdb.com/api.php?amount=1")
      .then((response) => {
        if (response.status === 200) {
          return response.json();
        } else if (response.status === 429) {
          setTimeout(loadQuiz, 5000);
          throw new Error("Rate limited");
        } else {
          throw new Error(`Failed to fetch quiz: ${response.statusText}`);
        }
      })
      .then((data) => {
        clearTimeout(loadQuiz);
        setQuiz(data);
        const allAnswers = [
          ...data.results[0].incorrect_answers,
          data.results[0].correct_answer,
        ].sort(() => 0.5 - Math.random());
        setQuestions(allAnswers);
        setCorrectAnswer(data.results[0].correct_answer);
        setShowQuestion(true);
      })
      .catch((error) => console.log(error));
  };

  return (
    <AuthenticatedLayout
    header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
>
    <main className="flex min-h-screen flex-col items-center justify-center p-24">
      <div
        id="quiz_container"
        className="z-10 w-full max-w-5xl items-center justify-center font-mono text-sm lg:flex"
      >
        {start ? "" : <button onClick={loadQuiz}>load</button>}
        {showQuestion && quiz ? (
          <div>
            <h1>current score: {score}</h1>
            <p>{decode(quiz.results[0].question)}</p>
            <div>
              {questions.map((element, index) => (
                <button
                  id={index}
                  key={index}
                  className={`border-white border-2 rounded-md p-2 m-2 text-white`}
                  onClick={() => {
                    setTimeout(() => {
                      element !== correctAnswer
                        ? loadQuiz()
                        : (setScore(score + 1), loadQuiz());
                    }, 1000);

                    anime({
                      targets: container,
                      translateY: [
                        {
                          value: window.innerHeight - 600,
                          duration: 1000,
                          easing: "easeOutSine",
                        },
                        {
                          value: 0,
                          duration: 1000,
                          easing: "easeInSine",
                          loop: 1,
                        },
                      ],
                      opacity: [
                        { value: 0, duration: 1000, easing: "easeOutSine" },
                        {
                          value: 1,
                          duration: 1000,
                          easing: "easeInSine",
                          loop: 1,
                        },
                      ],
                      duration: 2000,
                      easing: "easeOutSine",
                      loop: 1,
                      backgroundColor: [
                        {
                          value:
                            element !== correctAnswer ? "#f40d30" : "#B8F905",
                          duration: 200,
                          easing: "easeOutSine",
                        },
                        {
                          value: "rgba(0,0,0,0.5)",
                          duration: 200,
                          easing: "easeOutSine",
                          loop: 1,
                        },
                      ],
                    });
                  }}
                >
                  {decode(element)}
                </button>
              ))}
            </div>
          </div>
        ) : null}
      </div>
    </main>
    </AuthenticatedLayout>
  );
}
