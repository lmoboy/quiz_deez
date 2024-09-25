import { useState } from "react";

/**
 * Generates a form for the user to input the parameters for the API request.
 * The form contains fields for the number of questions, category, difficulty, and
 * type of question. The form also contains a submit button to generate the API
 * URL based on the user's input.
 * @param {{onSubmit: (formData: {trivia_amount: number, trivia_category: string, trivia_difficulty: string, trivia_type: string}) => void}} props
 * @returns {JSX.Element}
 */
export default function Form({ onSubmit }) {
    const [formData, setFormData] = useState({
        trivia_amount: 10,
        trivia_category: "",
        trivia_difficulty: "",
        trivia_type: "",
    });
    const categories = [
        { value: "9", name: "General Knowledge" },
        { value: "10", name: "Entertainment: Books" },
        { value: "11", name: "Entertainment: Film" },
        { value: "12", name: "Entertainment: Music" },
        { value: "13", name: "Entertainment: Musicals & Theatres" },
        { value: "14", name: "Entertainment: Television" },
        { value: "15", name: "Entertainment: Video Games" },
        { value: "16", name: "Entertainment: Board Games" },
        { value: "17", name: "Science & Nature" },
        { value: "18", name: "Science: Computers" },
        { value: "19", name: "Science: Mathematics" },
        { value: "20", name: "Mythology" },
        { value: "21", name: "Sports" },
        { value: "22", name: "Geography" },
        { value: "23", name: "History" },
        { value: "24", name: "Politics" },
        { value: "25", name: "Art" },
        { value: "26", name: "Celebrities" },
        { value: "27", name: "Animals" },
        { value: "28", name: "Vehicles" },
        { value: "29", name: "Entertainment: Comics" },
        { value: "30", name: "Science: Gadgets" },
        { value: "31", name: "Entertainment: Japanese Anime & Manga" },
        { value: "32", name: "Entertainment: Cartoon & Animations" },
    ];
  
  
    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(formData);
    };

    return (
        <form onSubmit={handleSubmit} className="border-2">
            <label htmlFor="trivia_amount">Number of Questions:</label>
            <input
                type="number"
                name="trivia_amount"
                id="trivia_amount"
                className="form-control"
                min="1"
                max="50"
                onChange={handleChange}
                value={formData.trivia_amount}
            />

            <br />

            <label htmlFor="trivia_category">Select Category: </label>
            <select
                name="trivia_category"
                id="trivia_category"
                onChange={handleChange}
                value={formData.trivia_category}
            >
  
            </select>

            <br />

            <label htmlFor="trivia_difficulty">Select Difficulty: </label>
            <select
                name="trivia_difficulty"
                id="trivia_difficulty"
                onChange={handleChange}
                value={formData.trivia_difficulty}
            >
                <option value="">Any Difficulty</option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <br />

            <label htmlFor="trivia_type">Select Type: </label>
            <select
                name="trivia_type"
                id="trivia_type"
                onChange={handleChange}
                value={formData.trivia_type}
            >
                &gt;
                <option value="">Any Type</option>
                <option value="multiple">Multiple Choice</option>
                <option value="boolean">True / False</option>
            </select>

            <br />

            <button className="btn btn-lg btn-primary btn-block" type="submit">
                Generate quiz
            </button>
        </form>
    );
}

Form.propTypes = {
    onSubmit: {
        formData: {
            trivia_amount: 10,
            trivia_category: "",
            trivia_difficulty: "",
            trivia_type: "",
        },
    },
};
