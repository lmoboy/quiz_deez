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
                <option value="">Any Category</option>
                <option value="9">General Knowledge</option>
                <option value="10">Entertainment: Books</option>
                <option value="11">Entertainment: Film</option>
                <option value="12">Entertainment: Music</option>
                <option value="13">
                    Entertainment: Musicals &amp; Theatres
                </option>
                <option value="14">Entertainment: Television</option>
                <option value="15">Entertainment: Video Games</option>
                <option value="16">Entertainment: Board Games</option>
                <option value="17">Science &amp; Nature</option>
                <option value="18">Science: Computers</option>
                <option value="19">Science: Mathematics</option>
                <option value="20">Mythology</option>
                <option value="21">Sports</option>
                <option value="22">Geography</option>
                <option value="23">History</option>
                <option value="24">Politics</option>
                <option value="25">Art</option>
                <option value="26">Celebrities</option>
                <option value="27">Animals</option>
                <option value="28">Vehicles</option>
                <option value="29">Entertainment: Comics</option>
                <option value="30">Science: Gadgets</option>
                <option value="31">
                    Entertainment: Japanese Anime &amp; Manga
                </option>
                <option value="32">
                    Entertainment: Cartoon &amp; Animations
                </option>{" "}
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
