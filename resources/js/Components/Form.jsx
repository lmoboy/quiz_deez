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
        <form onSubmit={handleSubmit} className="bg-white p-6 rounded-lg shadow-lg">
            <h2 className="text-2xl font-bold mb-4 text-gray-800">Configure Your Quiz</h2>
            
            <div className="mb-4">
                <label htmlFor="trivia_amount" className="block text-gray-700 font-semibold mb-2">Number of Questions:</label>
                <input
                    type="number"
                    name="trivia_amount"
                    id="trivia_amount"
                    className="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="1"
                    max="50"
                    onChange={handleChange}
                    value={formData.trivia_amount}
                />
            </div>

            <div className="mb-4">
                <label htmlFor="trivia_category" className="block text-gray-700 font-semibold mb-2">Select Category:</label>
                <select
                    name="trivia_category"
                    id="trivia_category"
                    className="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onChange={handleChange}
                    value={formData.trivia_category}
                >
                    <option value="">Any Category</option>
                    <option value="9">General Knowledge</option>
                    <option value="21">Sports</option>
                    <option value="23">History</option>
                    <option value="17">Science & Nature</option>
                </select>
            </div>

            <div className="mb-4">
                <label htmlFor="trivia_difficulty" className="block text-gray-700 font-semibold mb-2">Select Difficulty:</label>
                <select
                    name="trivia_difficulty"
                    id="trivia_difficulty"
                    className="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onChange={handleChange}
                    value={formData.trivia_difficulty}
                >
                    <option value="">Any Difficulty</option>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
            </div>

            <div className="mb-4">
                <label htmlFor="trivia_type" className="block text-gray-700 font-semibold mb-2">Select Type:</label>
                <select
                    name="trivia_type"
                    id="trivia_type"
                    className="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onChange={handleChange}
                    value={formData.trivia_type}
                >
                    <option value="">Any Type</option>
                    <option value="multiple">Multiple Choice</option>
                    <option value="boolean">True / False</option>
                </select>
            </div>

            <button className="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out" type="submit">
                Generate Quiz
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
